<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageSlider;
use Illuminate\Http\Request;
use DataTables;
use Intervention\Image\Facades\Image;

class ImageSliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('admin.image_slider.index');
    }

    public function datatbleImageSlider()
    {
        $fetch = ImageSlider::whereIn('status', ['Publish', 'Draft'])
            ->get(['id', 'title', 'description', 'image'])
            ->toArray();

        $reform = array_map(function ($new, $index) {
            return [
                'no' => ($index + 1) . '.',
                'id' => $new['id'],
                'title' => $new['title'],
                'description' => $new['description'],
                'image' => $new['image']
            ];
        }, $fetch, array_keys($fetch));

        return DataTables::of($reform)->make(true);
    }

    public function create()
    {
        return view('admin.image_slider.create');
    }

    public function store(Request $request)
    {
        try {

            if (empty($request->image) || empty($request->title_slider) || empty($request->description_slider)) {
                return response()->json([
                    'status' => 'failed',
                    'code' => 400,
                    'message' => 'failed request'
                ], 400);
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $fileName = 'image_slider/image_slider_' . time() . '.' . $image->getClientOriginalExtension();
                $compressedImage = Image::make($image)
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $webpFilename = pathinfo($fileName, PATHINFO_FILENAME) . '.webp';
                $compressedImage->encode('webp')->save(public_path('images_upload/image_slider/' . $webpFilename));
                $image_name_db = 'image_slider/' . $webpFilename;
            } else {
                return response()->json([
                    'status' => 'failed',
                    'code' => 400,
                    'message' => 'Failed upload image',
                ], 400);
            }

            $image_slider = new ImageSlider();
            $image_slider->title = $request->title_slider;
            $image_slider->description = $request->description_slider;
            $image_slider->status = $request->status_slider;
            $image_slider->language = $request->language_slider;
            $image_slider->image = $image_name_db;
            $image_slider->save();

            return response()->json([
                'status'    => 'success',
                'code'  => 200,
                'message'   => 'Success Image Slider'
            ], 200);
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
        $image_slider = ImageSlider::find($id);
        return response()->json($image_slider);
    }

    public function update(Request $request, $id)
    {
        try {
            $image_slider = ImageSlider::find($id);
            if (!$image_slider) {
                return redirect()->route('admin.image-slider');
            }


            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $fileName = 'image_slider/image_slider_' . time() . '.' . $image->getClientOriginalExtension();
                $compressedImage = Image::make($image)
                    ->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                $webpFilename = pathinfo($fileName, PATHINFO_FILENAME) . '.webp';
                $compressedImage->encode('webp')->save(public_path('images_upload/image_slider/' . $webpFilename));
                $image_name_db = 'image_slider/' . $webpFilename;
            } else {
                $image_name_db = $image_slider->image;
            }

            $image_slider->update([
                'title' => $request->input('title_slider', $image_slider->title),
                'description' => $request->input('description_slider', $image_slider->description),
                'status' => $request->input('status_slider', $image_slider->status),
                'image' => $image_name_db,
            ]);

            return response()->json([
                'status'    => 'success',
                'code'  => 200,
                'message'   => 'Success Image Slider'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status'    => 'failed',
                'code'  => 500,
                'message'   => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        ImageSlider::where('id', $id)->update(['status' => 'Delete']);

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Success delete slide!'
        ]);
    }
}
