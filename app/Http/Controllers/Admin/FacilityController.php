<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use DataTables;

class FacilityController extends Controller
{
    public function index()
    {
        return view('admin.facility.index');
    }

    public function datatable()
    {
        $fetch = Facility::where('status', 'Publish')
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
}
