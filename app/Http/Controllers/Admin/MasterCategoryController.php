<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterCategory;
use Illuminate\Http\Request;
use DataTables;

class MasterCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $master_category->name = $request->name;
        $master_category->language = $request->language;
        $master_category->save();

        return response()->json([
            'status'    => 'success',
            'code'  => 200,
            'message'   => 'Success add category!'
        ]);
    }

    public function edit($id)
    {
        $category = MasterCategory::find($id);
        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $master_category = MasterCategory::find($id);

        if (!$master_category) {
            return response()->json([
                'status' => 'failed',
                'code' => 404,
                'message' => 'Not Found!'
            ], 404);
        }

        $master_category->name = $request->input('name', $master_category->name);
        $master_category->language = $request->input('language', $master_category->language);
        $master_category->save();

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Success edit category!'
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
