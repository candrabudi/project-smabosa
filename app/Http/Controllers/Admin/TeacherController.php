<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use DB;
use DataTables;
use Intervention\Image\Facades\Image;

class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.teacher.index');
    }

    public function datatable()
    {
        $fetch = Teacher::whereIn('status', ['Publish', 'Draft'])
            ->orderBy('created_at', 'DESC')
            ->get()
            ->toArray();

        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'teacher_name' => $new['teacher_name'],
                'teacher_subjects' => $new['teacher_subjects'],
                'teacher_type' => $new['teacher_type'],
            ]; 
        }, $fetch);
        
        return DataTables::of($reform)->make(true);
    }

    public function create()
    {
        return view('admin.teacher.create');
    }

    public function store(Request $request)
    {
        try{
            if ($request->hasFile('teacher_photo')) {
                $image = $request->file('teacher_photo');
                $fileName = 'school_teacher/teacher_' . time() . '.' . $image->getClientOriginalExtension();
                $compressedImage = Image::make($image)
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $webpFilename = pathinfo($fileName, PATHINFO_FILENAME) . '.webp';
                $compressedImage->encode('webp')->save(public_path('images_upload/school_teacher/' . $webpFilename));
                $image_name_db = 'school_teacher/' . $webpFilename;
            }else{
                return response()->json([
                    'status'    => 'failed', 
                    'code'      => 400, 
                    'message'   => 'Error upload thumbnail!',
                    'request' => $request->all()
                ], 400);
            }

            $store_teacher = new Teacher();
            $store_teacher->teacher_name = $request->teacher_name;
            $store_teacher->teacher_subjects = $request->teacher_subjects;
            $store_teacher->teacher_type = $request->teacher_type;
            $store_teacher->status = $request->status;
            $store_teacher->teacher_photo = $image_name_db;
            $store_teacher->save();

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
        $teacher = Teacher::where('id', $id)
            ->first();
        if(!$teacher){
            return redirect()->route('admin.school-achievement');
        }

        return view('admin.teacher.edit', compact(['teacher']));
    }

    public function update(Request $request, $id){
        $school_teacher = Teacher::where('id', $id)
            ->first();
        if(!$school_teacher){
            return response()->json([
                'status'    => 'failed', 
                'code'  => 400, 
                'message'   => 'No Data!'
            ], 400);
        }
        DB::beginTransaction();
        try{
            $lowercase = strtolower($request->teacher_name);
            $slug = str_replace(' ','-', $lowercase);
            if ($request->hasFile('teacher_photo')) {
                $image = $request->file('teacher_photo');
                $fileName = 'school_teacher/teacher_' . time() . '.' . $image->getClientOriginalExtension();
                $compressedImage = Image::make($image)
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $webpFilename = pathinfo($fileName, PATHINFO_FILENAME) . '.webp';
                $compressedImage->encode('webp')->save(public_path('images_upload/school_teacher/' . $webpFilename));
                $image_name_db = 'school_teacher/' . $webpFilename;
            }else{
                $image_name_db = null;
            }

            $school_teacher->teacher_name = $request->teacher_name ?? $school_teacher->teacher_name ;
            $school_teacher->teacher_subjects = $request->teacher_subjects ?? $school_teacher->teacher_subjects;
            $school_teacher->teacher_type = $request->teacher_type ?? $school_teacher->teacher_type;
            $school_teacher->status = $request->status ?? $school_teacher->status;
            // $school_teacher->teacher_slug = $slug ?? $school_teacher->teacherslug;
            $school_teacher->teacher_photo = $image_name_db ?? $school_teacher->teacher_photo;
            $school_teacher->save();

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
                'message'   => $e->getMessage()
            ], 500);
        }
    }
    public function delete($id)
    {
        Teacher::where('id', $id)
            ->update([
                'status' => 'Delete'
            ]);
        return response()->json([
            'status'    => 'success',
            'code'  => 200,
            'message'   => 'Success delete teacher!'
        ]);
    }
}
