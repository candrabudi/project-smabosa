<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSchool;
use Illuminate\Http\Request;
use DataTables;

class AboutSchoolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $about_school = AboutSchool::first();
        return view('admin.about.index', compact([
            'about_school'
        ]));
    }
    public function datatable()
    {
        $fetch = AboutSchool::get()
            ->toArray();

        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'title' => $new['title'],
                'short_desc' => $new['short_desc'],
                'language' => $new['language'],
            ]; 
        }, $fetch);
        
        return DataTables::of($reform)->make(true);
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'short_desc' => 'required',
                'language' => 'required',
                'about_thumbnail' => 'required|file'
            ]);
        
            $image = $request->file('about_thumbnail');
            $imageName = 'about_thumbnail/about_thumbnail_' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images_upload/about_thumbnail'), $imageName);
        
            $store_about = new AboutSchool();
            $store_about->title = $request->title;
            $store_about->content = $request->content;
            $store_about->short_desc = $request->short_desc;
            $store_about->language = $request->language;
            $store_about->thumbnail = $imageName;
            $store_about->save();
        
            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Success store about'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'code' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $about_school = AboutSchool::find($id);
        return view('admin.about.edit', compact([
            'about_school'
        ]));
    }

    public function update(Request $request)
    {
        $check = AboutSchool::first();
        if($request->hasFile('about_thumbnail')) {
            $image = $request->file('about_thumbnail');
            $imageName = 'about_thumbnail/about_thumbnail_'.time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images_upload/about_thumbnail'), $imageName);
        }else{
            $imageName = null;
        }
        $check->title = $request->title ?? $check->title;
        $check->content = $request->content ?? $check->content;
        $check->short_desc = $request->short_desc?? $check->short_desc;
        $check->thumbnail = $imageName ?? $check->thumbnail;
        $check->save();
    }
}
