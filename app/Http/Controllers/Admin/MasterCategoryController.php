<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterCategory;
use Illuminate\Http\Request;
use DataTables;

class MasterCategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }
    public function datatable()
    {
        $fetch = MasterCategory::get()
            ->toArray();

        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'name' => $new['name'],
            ]; 
        }, $fetch);
        
        return DataTables::of($reform)->make(true);
    }
    public function store(Request $request)
    {
        $master_category = new MasterCategory();
        $master_category->name = $request->nama;
        $master_category->save();

        return response()->json([
            'status'    => 'success',
            'code'  => 200,
            'message'   => 'Success add category!'
        ]);
    }

    public function edit($id)
    {
        $master_category = MasterCategory::where('id', $id)
            ->first();
        if(!$master_category){
            return redirect()->route('admin.master_categories');
        }

        return view('admin.categories.edit', compact('master_category'));
    }

    public function update(Request $request, $id)
    {
        $master_category = MasterCategory::where('id', $id)
            ->first();
        if(!$master_category){
            return redirect()->route('admin.master_categories');
        }
        $master_category->name = $request->nama ?? $master_category->name;
        $master_category->save();

        return response()->json([
            'status'    => 'success',
            'code'  => 200,
            'message'   => 'Success edit category!'
        ]);
    }
    
    public function delete($id)
    {
        MasterCategory::where('id', $id)
            ->delete();
        
        return response()->json([
            'status'    => 'success',
            'code'  => 200,
            'message'   => 'Success delete category!'
        ]);
    }
}
