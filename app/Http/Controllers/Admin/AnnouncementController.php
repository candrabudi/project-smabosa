<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use DataTables;
use DB;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('admin.announcement.index');
    }

    public function datatable()
    {
        $fetch = Announcement::whereIn('status', ['Publish', 'Draft'])
            ->orderBy('created_at', 'DESC')
            ->get()
            ->toArray();

        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'title' => $new['title'],
                'short_desc' => $new['short_desc'],
            ]; 
        }, $fetch);
        
        return DataTables::of($reform)->make(true);
    }

    public function create()
    {
        return view('admin.announcement.create');
    }

    public function store(Request $request)
    {
        try{
            $lowercase = strtolower($request->title);
            $slug = str_replace(' ','-', $lowercase);
            if ($request->hasFile('announcement_thumbnail')) {
                $image = $request->file('announcement_thumbnail');
                $imageName = 'school_announcement/school_announcement_'.time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/school_announcement'), $imageName);
            }else{
                return response()->json([
                    'status'    => 'failed', 
                    'code'      => 400, 
                    'message'   => 'Error upload thumbnail!',
                    'request' => $request->all()
                ], 400);
            }

            $store_announcement = new announcement();
            $store_announcement->title = $request->title;
            $store_announcement->slug = $slug;
            $store_announcement->short_desc = $request->short_desc;
            $store_announcement->content = $request->content;
            $store_announcement->status = $request->status;
            $store_announcement->thumbnail = $imageName;
            $store_announcement->save();

            DB::commit();
            return response()->json([
                'status'    => 'success',
                'code'  => 200,
                'message'   => 'Success store School Achievement!'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status'    => 'failed', 
                'code'  => 500, 
                'message'   => $e->getMessage(),
                'data'  => $request
            ], 500);
        }
    }

    public function edit(Request $request, $id)
    {
        $announcement = Announcement::where('id', $id)
            ->first();
        if(!$announcement){
            return redirect()->route('admin.school-achievement');
        }

        return view('admin.announcement.edit', compact(['announcement']));
    }

    public function update(Request $request, $id){
        $school_announcement = Announcement::where('id', $id)
            ->first();
        if(!$school_announcement){
            return response()->json([
                'status'    => 'failed', 
                'code'  => 400, 
                'message'   => 'No Data!'
            ], 400);
        }
        DB::beginTransaction();
        try{
            $lowercase = strtolower($request->title);
            $slug = str_replace(' ','-', $lowercase);
            if ($request->hasFile('announcement_thumbnail')) {
                $image = $request->file('achievement_thumbnail');
                $imageName = 'school_announcement/school_announcement_'.time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/school_announcement'), $imageName);
            }else{
                $imageName = null;
            }

            $school_announcement->title = $request->title ?? $school_announcement->title ;
            $school_announcement->short_desc = $request->short_desc ?? $school_announcement->short_desc;
            $school_announcement->content = $request->content ?? $school_announcement->content;
            $school_announcement->status = $request->status ?? $school_announcement->status;
            $school_announcement->slug = $slug ?? $school_announcement->slug;
            $school_announcement->thumbnail = $imageName ?? $school_announcement->thumbnail;
            $school_announcement->save();

            DB::commit();
            return response()->json([
                'status'    => 'success',
                'code'  => 200,
                'message'   => 'Success edit achievement school!'
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
        Announcement::where('id', $id)
            ->update([
                'status' => 'Delete'
            ]);
        return response()->json([
            'status'    => 'success',
            'code'  => 200,
            'message'   => 'Success delete School Achievement!'
        ]);
    }
}
