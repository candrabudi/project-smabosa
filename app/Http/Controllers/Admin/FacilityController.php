<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use DataTables;
use DB;
class FacilityController extends Controller
{
    public function index()
    {
        return view('admin.facility.index');
    }

    public function datatable()
    {
        $fetch = Facility::whereIn('status', ['Publish', 'Draft'])
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
        return view('admin.facility.create');
    }

    public function store(Request $request)
    {
        try{
            $lowercase = strtolower($request->title);
            $slug = str_replace(' ','-', $lowercase);
            if ($request->hasFile('facility_thumbnail')) {
                $image = $request->file('facility_thumbnail');
                $imageName = 'school_facility/school_facility_'.time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/school_facility'), $imageName);
            }else{
                return response()->json([
                    'status'    => 'failed', 
                    'code'      => 400, 
                    'message'   => 'Error upload thumbnail!',
                    'request' => $request->all()
                ], 400);
            }

            $store_facility = new Facility();
            $store_facility->title = $request->title;
            $store_facility->slug = $slug;
            $store_facility->short_desc = $request->short_desc;
            $store_facility->content = $request->content;
            $store_facility->status = $request->status;
            $store_facility->thumbnail = $imageName;
            $store_facility->save();

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
        $facility = Facility::where('id', $id)
            ->first();
        if(!$facility){
            return redirect()->route('admin.school-achievement');
        }

        return view('admin.facility.edit', compact(['facility']));
    }

    public function update(Request $request, $id){
        $school_facility = Facility::where('id', $id)
            ->first();
        if(!$school_facility){
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
            if ($request->hasFile('facility_thumbnail')) {
                $image = $request->file('achievement_thumbnail');
                $imageName = 'school_facility/school_facility_'.time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/school_facility'), $imageName);
            }else{
                $imageName = null;
            }

            $school_facility->title = $request->title ?? $school_facility->title ;
            $school_facility->short_desc = $request->short_desc ?? $school_facility->short_desc;
            $school_facility->content = $request->content ?? $school_facility->content;
            $school_facility->status = $request->status ?? $school_facility->status;
            $school_facility->slug = $slug ?? $school_facility->slug;
            $school_facility->thumbnail = $imageName ?? $school_facility->thumbnail;
            $school_facility->save();

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
        Facility::where('id', $id)
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
