<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DataTables;
use DB;

class EventController extends Controller
{
    public function index()
    {
        return view('admin.event.index');
    }

    public function datatable()
    {
        $fetch = Event::get()
            ->toArray();

        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'title' => $new['title'],
                'short_desc' => $new['short_desc'],
                'event' => $new['event'],
                'event_date' => $this->tgl_indo(Carbon::parse($new['event_date'])->format('Y-m-d')),
                'location' => $new['location'],
            ]; 
        }, $fetch);
        
        return DataTables::of($reform)->make(true);
    }

    public function create(Request $request)
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        try{
            $lowercase = strtolower($request->post_title);
            $slug = str_replace(' ','-', $lowercase);
            if ($request->hasFile('event_thumbnail')) {
                $image = $request->file('event_thumbnail');
                $imageName = 'event_thumbnail_'.time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('event_thumbnail'), $imageName);
            }else{
                return response()->json([
                    'status'    => 'failed', 
                    'code'      => 400, 
                    'message'   => 'Error upload thumbnail!'
                ], 400);
            }

            $store_event = new Event();
            $store_event->title = $request->title;
            $store_event->slug = $slug;
            $store_event->short_desc = $request->short_desc;
            $store_event->content = $request->content;
            $store_event->event = $request->event;
            $store_event->event_date = $request->event_date;
            $store_event->location = $request->location;
            $store_event->thumbnail = $imageName;
            $store_event->is_active = 1;
            $store_event->save();

            DB::commit();
            return response()->json([
                'status'    => 'success',
                'code'  => 200,
                'message'   => 'Success store post!'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status'    => 'failed', 
                'code'  => 500, 
                // 'message'   => 'Something Wrong Error'
                'message'   => $e->getMessage(),
                'data'  => $request
            ], 500);
        }
    }

    public function edit(Request $request, $id)
    {
        $event = Event::where('id', $id)
            ->first();
        if(!$event){
            return redirect()->route('admin.event');
        }
        return view('admin.event.edit', compact(['event']));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{

            $event = Event::where('id', $id)
                ->first();
            if(!$event){
                return redirect()->route('admin.event');
            }
            $lowercase = strtolower($request->post_title);
            $slug = str_replace(' ','-', $lowercase);
            if ($request->hasFile('event_thumbnail')) {
                $image = $request->file('event_thumbnail');
                $imageName = 'event_thumbnail_'.time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('event_thumbnail'), $imageName);
            }else{
                $imageName = null;
            }

            $event->title = $request->title ?? $event->title ;
            $event->short_desc = $request->short_desc ?? $event->short_desc;
            $event->content = $request->content ?? $event->content;
            $event->event = $request->event ?? $event->event;
            $event->event_date = $request->event_date ?? $event->event_date;
            $event->location = $request->location ?? $event->location;
            // $event->event = $request->event ?? $event->event;
            $event->slug = $slug ?? $event->slug;
            $event->thumbnail = $imageName ?? $event->thumbnail;
            $event->save();

            DB::commit();
            return response()->json([
                'status'    => 'success',
                'code'  => 200,
                'message'   => 'Success edit event!'
            ]);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json([
                'status'    => 'failed', 
                'code'      => 500, 
                // 'message'   => 'Something wrong error!'
                'message'   => $e->getMessage()
            ], 500);
        }

    }

    public function delete($id)
    {
        Event::where('id', $id)->delete();
        return response()->json([
            'status'    => 'success', 
            'code'  => 200, 
            'message'   => 'success delete event'
        ], 200);
    }

    private function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
}
