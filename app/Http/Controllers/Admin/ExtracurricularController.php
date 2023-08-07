<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Http\Request;
use DataTables;
use Intervention\Image\Facades\Image;
use DB;

class ExtracurricularController extends Controller
{
    public function index()
    {
        return view('admin.extracurricular.index');
    }

    public function datatable()
    {
        $fetch = Extracurricular::whereIn('status', ['Publish', 'Draft'])
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
        return view('admin.extracurricular.create');
    }

    public function store(Request $request)
    {
        try{
            $lowercase = strtolower($request->title);
            $slug = str_replace(' ','-', $lowercase);
            if ($request->hasFile('extracurricular_thumbnail')) {
                $image = $request->file('extracurricular_thumbnail');
                $fileName = 'school_extracurricular/school_extracurricular_' . time() . '.' . $image->getClientOriginalExtension();
                $compressedImage = Image::make($image)
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $webpFilename = pathinfo($fileName, PATHINFO_FILENAME) . '.webp';
                $compressedImage->encode('webp')->save(public_path('images_upload/school_extracurricular/' . $webpFilename));
                $image_name_db = 'school_extracurricular/' . $webpFilename;
            }else{
                return response()->json([
                    'status'    => 'failed', 
                    'code'      => 400, 
                    'message'   => 'Error upload thumbnail!',
                    'request' => $request->all()
                ], 400);
            }

            $store_extracurricular = new Extracurricular();
            $store_extracurricular->title = $request->title;
            $store_extracurricular->slug = $slug;
            $store_extracurricular->short_desc = $request->short_desc;
            $store_extracurricular->content = $request->content;
            $store_extracurricular->status = $request->status;
            $store_extracurricular->thumbnail = $image_name_db;
            $store_extracurricular->save();

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
        $extracurricular = Extracurricular::where('id', $id)
            ->first();
        if(!$extracurricular){
            return redirect()->route('admin.school-achievement');
        }

        return view('admin.extracurricular.edit', compact(['extracurricular']));
    }

    public function update(Request $request, $id){
        $school_extracurricular = Extracurricular::where('id', $id)
            ->first();
        if(!$school_extracurricular){
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
            if ($request->hasFile('extracurricular_thumbnail')) {
                $image = $request->file('extracurricular_thumbnail');
                $fileName = 'school_extracurricular/school_extracurricular_' . time() . '.' . $image->getClientOriginalExtension();
                $compressedImage = Image::make($image)
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $webpFilename = pathinfo($fileName, PATHINFO_FILENAME) . '.webp';
                $compressedImage->encode('webp')->save(public_path('images_upload/school_extracurricular/' . $webpFilename));
                $image_name_db = 'school_extracurricular/' . $webpFilename;
            }else{
                $image_name_db = null;
            }

            $school_extracurricular->title = $request->title ?? $school_extracurricular->title ;
            $school_extracurricular->short_desc = $request->short_desc ?? $school_extracurricular->short_desc;
            $school_extracurricular->content = $request->content ?? $school_extracurricular->content;
            $school_extracurricular->status = $request->status ?? $school_extracurricular->status;
            $school_extracurricular->slug = $slug ?? $school_extracurricular->slug;
            $school_extracurricular->thumbnail = $image_name_db ?? $school_extracurricular->thumbnail;
            $school_extracurricular->save();

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
        Extracurricular::where('id', $id)
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
