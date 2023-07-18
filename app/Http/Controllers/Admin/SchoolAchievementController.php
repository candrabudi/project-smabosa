<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolAchievement;
use Illuminate\Http\Request;
use DataTables;
use DB;
class SchoolAchievementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.school_achievement.index');
    }

    public function datatable()
    {
        $fetch = SchoolAchievement::get()
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
        return view('admin.school_achievement.create');
    }

    public function store(Request $request)
    {
        try{
            $lowercase = strtolower($request->totle);
            $slug = str_replace(' ','-', $lowercase);
            if ($request->hasFile('achievement_thumbnail')) {
                $image = $request->file('achievement_thumbnail');
                $imageName = 'school_achievement/school_achievement_'.time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/school_achievement'), $imageName);
            }else{
                return response()->json([
                    'status'    => 'failed', 
                    'code'      => 400, 
                    'message'   => 'Error upload thumbnail!'
                ], 400);
            }

            $store_event = new SchoolAchievement();
            $store_event->title = $request->title;
            $store_event->slug = $slug;
            $store_event->short_desc = $request->short_desc;
            $store_event->content = $request->content;
            $store_event->achievement_gainer = $request->peraih_prestasi;
            $store_event->status = $request->status;
            $store_event->thumbnail = $imageName;
            $store_event->save();

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
                // 'message'   => 'Something Wrong Error'
                'message'   => $e->getMessage(),
                'data'  => $request
            ], 500);
        }
    }

    public function edit(Request $request, $id)
    {
        $school_achievement = SchoolAchievement::where('id', $id)
            ->first();
        if(!$school_achievement){
            return redirect()->route('admin.school-achievement');
        }

        return view('admin.school_achievement.edit', compact(['school_achievement']));
    }

    public function update(Request $request, $id){
        $school_achievement = SchoolAchievement::where('id', $id)
            ->first();
        if(!$school_achievement){
            return response()->json([
                'status'    => 'failed', 
                'code'  => 400, 
                'message'   => 'No Data!'
            ], 400);
        }
        DB::beginTransaction();
        try{
            $lowercase = strtolower($request->post_title);
            $slug = str_replace(' ','-', $lowercase);
            if ($request->hasFile('achievement_thumbnail')) {
                $image = $request->file('achievement_thumbnail');
                $imageName = 'school_achievement/school_achievement_'.time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/school_achievement'), $imageName);
            }else{
                $imageName = null;
            }

            $school_achievement->title = $request->title ?? $school_achievement->title ;
            $school_achievement->short_desc = $request->short_desc ?? $school_achievement->short_desc;
            $school_achievement->content = $request->content ?? $school_achievement->content;
            $school_achievement->satus = $request->satus ?? $school_achievement->satus;
            $school_achievement->slug = $slug ?? $school_achievement->slug;
            $school_achievement->thumbnail = $imageName ?? $school_achievement->thumbnail;
            $school_achievement->achievement_gainer = $request->peraih_prestasi ?? $school_achievement->achievement_gainer;
            $school_achievement->save();

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
        SchoolAchievement::where('id', $id)
            ->update([
                'is_active' => 0, 
                'is_delete' => 1
            ]);
        return response()->json([
            'status'    => 'success',
            'code'  => 200,
            'message'   => 'Success delete School Achievement!'
        ]);
    }
    
}
