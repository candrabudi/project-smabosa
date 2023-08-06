<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProgram;
use Illuminate\Http\Request;

class SchoolProgramController extends Controller
{
    public function indexRegular()
    {
        $school_program = SchoolProgram::where('title', 'PROGRAM REGULER')
            ->first();
        return view('admin.school_program.index', compact('school_program'));
    }
    
    public function indexBosaAis()
    {
        $school_program = SchoolProgram::where('title', 'BOSA-AIS EDUCATIONAL PROGRAM')
            ->first();
        return view('admin.school_program.bosa_ais', compact('school_program'));
    }
    
    public function storeRegular(Request $request)
    {
        try{
            $check = SchoolProgram::where('title', 'PROGRAM REGULER')
                ->first();
            if(!$check){
                $store_program = new SchoolProgram();
                $store_program->title = $request->title;
                $store_program->content = $request->content;
                $store_program->short_desc = $request->short_desc;
                $store_program->save();
            }else{
                $check->title = $request->title ?? $check->title;
                $check->content = $request->content ?? $check->content;
                $check->short_desc = $request->short_desc?? $check->short_desc;
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
    public function storeBosaAis(Request $request)
    {
        try{
            $check = SchoolProgram::where('title', 'BOSA-AIS EDUCATIONAL PROGRAM')
                ->first();
            if(!$check){
                $store_program = new SchoolProgram();
                $store_program->title = $request->title;
                $store_program->content = $request->content;
                $store_program->short_desc = $request->short_desc;
                $store_program->save();
            }else{
                $check->title = $request->title ?? $check->title;
                $check->content = $request->content ?? $check->content;
                $check->short_desc = $request->short_desc?? $check->short_desc;
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
