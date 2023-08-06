<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeInformation;
use Illuminate\Http\Request;
use DataTables;
class HomeInformationController extends Controller
{
    public function index()
    {
        return view('admin.home_information.index');
    }

    public function datatable()
    {
        $fetch = HomeInformation::get()
            ->toArray();

        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'name' => $new['name'],
                'image' => $new['image'],
                'language' => $new['language'],
            ]; 
        }, $fetch);
        
        return DataTables::of($reform)->make(true);
    }
}
