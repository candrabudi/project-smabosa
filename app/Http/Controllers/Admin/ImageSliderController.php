<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageSlider;
use Illuminate\Http\Request;
use DataTables;

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
            ->get()
            ->toArray();

        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'title' => $new['title'], 
                'description'   => $new['description'], 
                'image' => $new['image']
            ]; 
        }, $fetch);
        
        return DataTables::of($reform)->make(true);
    }

    public function create()
    {
        return view('admin.image_slider.create');
    }

    public function store(Request $request)
    {
        try{

            if(empty($request->image) || empty($request->title_slider) || empty($request->description_slider)){
                return response()->json([
                    'status'    => 'failed', 
                    'code'  => 400, 
                    'message'   => 'failed request'
                ], 400);
            }

            if($request->hasFile('image')) {
                $originName = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileName = 'image_slider/image_slider' . '_' . time() . '.' . $extension;
          
                $request->file('image')->move(public_path('images/image_slider'), $fileName);
            }else{
                return response()->json([
                    'status'    => 'failed', 
                    'code'  => 400, 
                    'message'   => 'Failed upload image'
                ], 400);
            }

            $image_slider = new ImageSlider();
            $image_slider->title = $request->title_slider;
            $image_slider->description = $request->description_slider;
            $image_slider->image = $fileName;
            $image_slider->save();

            return response()->json([
                'status'    => 'success', 
                'code'  => 200, 
                'message'   => 'Success Image Slider'
            ], 200);

        }catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $image_slider = ImageSlider::where('id', $id)
            ->first();
        if(!$image_slider){
            return redirect()->route('admin.image-slider');
        }
        return view('admin.image_slider.edit', compact(['image_slider']));
    }

    public function update(Request $request, $id)
    {
        try{

            $image_slider = ImageSlider::where('id', $id)
            ->first();
            if(!$image_slider){
                return redirect()->route('admin.image-slider');
            }
            if($request->hasFile('image')) {
                $originName = $request->file('image')->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileName = 'images/image_slider' . '_' . time() . '.' . $extension;
        
                $request->file('image')->move(public_path('images/image_slider'), $fileName);
            }else{
                $fileName = null;
            }

            $image_slider->title = $request->title_slider ?? $image_slider->title;
            $image_slider->description = $request->description_slider ?? $image_slider->description;
            $image_slider->image = $fileName ?? $image_slider->image;
            $image_slider->save();

            return response()->json([
                'status'    => 'success', 
                'code'  => 200, 
                'message'   => 'Success Image Slider'
            ], 200);

        }catch(\Exception $e){
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        ImageSlider::where('id', $id)
            ->update([
                'status' => 'Delete'
            ]);
        
        return response()->json([
            'status'    => 'success',
            'code'  => 200,
            'message'   => 'Success delete slide!'
        ]);
    }
}
