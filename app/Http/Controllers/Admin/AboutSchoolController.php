<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSchool;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        try{
            $check = AboutSchool::first();
            if(!$check){
                if($request->hasFile('about_thumbnail')) {
                    $image = $request->file('about_thumbnail');
                    $imageName = 'about_thumbnail/about_thumbnail_'.time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/about_thumbnail'), $imageName);
                }else{
                    return response()->json([
                        'status'    => 'failed', 
                        'code'      => 400, 
                        'message'   => 'Error upload thumbnail!'
                    ], 400);
                }
                $store_about = new AboutSchool();
                $store_about->title = $request->title;
                $store_about->content = $request->content;
                $store_about->short_desc = $request->short_desc;
                $store_about->thumbnail = $imageName;
                $store_about->save();
            }else{
                if($request->hasFile('about_thumbnail')) {
                    $image = $request->file('about_thumbnail');
                    $imageName = 'about_thumbnail/about_thumbnail_'.time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/about_thumbnail'), $imageName);
                }else{
                    $imageName = null;
                }
                $check->title = $request->title ?? $check->title;
                $check->content = $request->content ?? $check->content;
                $check->short_desc = $request->short_desc?? $check->short_desc;
                $check->thumbnail = $imageName ?? $check->thumbnail;
                $check->save();
            }

            return response()->json([
                'status'    => 'success', 
                'code'  => 200, 
                'message'   => 'Success store about'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status'    => 'failed',
                'code'  => 500, 
                'message'   => $e->getMessage()
            ], 500);
        }
    }
}
