<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeInformation;
use Illuminate\Http\Request;
use DataTables;
use Intervention\Image\Facades\Image;
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
        $reform = array_map(function ($new) use (&$i) {
            $i++;
            return [
                'no' => $i . '.',
                'id' => $new['id'],
                'info_name' => $new['info_name'],
                'info_lang' => $new['info_lang'],
                'info_position' => $new['info_position'],
            ];
        }, $fetch);

        return DataTables::of($reform)->make(true);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'info_name' => 'required',
                'info_lang' => 'required',
                'info_image' => 'required|file'
            ]);

            $image = $request->file('info_image');
            $fileName = 'home_information/home_information_' . time() . '.' . $image->getClientOriginalExtension();
            $compressedImage = Image::make($image)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $webpFilename = pathinfo($fileName, PATHINFO_FILENAME) . '.webp';
            $compressedImage->encode('webp')->save(public_path('images_upload/home_information/' . $webpFilename));
            $image_name_db = 'home_information/' . $webpFilename;

            $store = new HomeInformation();
            $store->info_name = $request->info_name;
            $store->info_lang = $request->info_lang;
            $store->info_position = $request->info_position;
            $store->route = '-';
            $store->info_image = $image_name_db;
            $store->info_status = 'Publish';
            $store->save();

            return response()->json([
                'status' => 'success',
                'code' => 200,
                'message' => 'Success store information'
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
        $home_info = HomeInformation::find($id);
        return response()->json($home_info);
    }

    public function update(Request $request, $id)
    {
        $check = HomeInformation::where('id', $id)
            ->first();
        if ($request->hasFile('info_image')) {
            $image = $request->file('info_image');
            $fileName = 'image_slider/home_information_' . time() . '.' . $image->getClientOriginalExtension();
            $compressedImage = Image::make($image)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $webpFilename = pathinfo($fileName, PATHINFO_FILENAME) . '.webp';
            $compressedImage->encode('webp')->save(public_path('images_upload/home_information/' . $webpFilename));
            $image_name_db = 'image_slider/' . $webpFilename;
        } else {
            $image_name_db = null;
        }
        $check->info_name = $request->info_name ?? $check->info_name;
        $check->info_lang = $request->info_lang ?? $check->info_lang;
        $check->info_image = $image_name_db ?? $check->info_image;
        $check->save();

        return $check->info_image;
    }
}
