<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BosaPage;
use Illuminate\Http\Request;
use DataTables;
use DB;
class BosaPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.bosa_page.index');
    }
    public function datatable()
    {
        $fetch = BosaPage::get()
            ->toArray();

        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'page_name' => $new['page_name'],
                'page_desc' => $new['page_desc'],
                'page_lang' => $new['page_lang'],
                'page_status' => $new['page_status'],
            ]; 
        }, $fetch);
        
        return DataTables::of($reform)->make(true);
    }
    public function create()
    {
        return view('admin.bosa_page.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $lowercase = strtolower($request->page_name);
            $slug = str_replace(' ','-', $lowercase);
            $store = new BosaPage();
            $store->page_name = $request->page_name;
            $store->page_slug = $slug;
            $store->page_desc = $request->page_desc;
            $store->page_content = $request->page_content;
            $store->page_lang = $request->page_lang;
            $store->page_status = $request->page_status;
            $store->save();

            DB::commit();
            return response()->json([
                'status' => 'success', 
                'code' => 200, 
                'message' => 'Success store page'
            ]);

        }catch(\Exception $e){
            DB::rollback();
            return response()->json([
                'status' => 'failed', 
                'code' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function edit($id)
    {
        $bosa_page = BosaPage::where('id', $id)
            ->first();
        return view('admin.bosa_page.edit', compact(['bosa_page']));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            $update = BosaPage::where('id', $id)->first();
            $lowercase = strtolower($request->page_name);
            $slug = str_replace(' ','-', $lowercase);
            $update->page_name = $request->page_name;
            $update->page_slug = $slug;
            $update->page_desc = $request->page_desc;
            $update->page_content = $request->page_content;
            $update->page_lang = $request->page_lang;
            $update->page_status = $request->page_status;
            $update->save();

            DB::commit();
            return response()->json([
                'status' => 'success', 
                'code' => 200, 
                'message' => 'Success update page'
            ]);

        }catch(\Exception $e){
            DB::rollback();
            return response()->json([
                'status' => 'failed', 
                'code' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
