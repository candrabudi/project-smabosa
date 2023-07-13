<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterCategory;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use DB;
use DataTables;
class PostController extends Controller
{
    public function __construct()
    {
        if(!Auth::user()){
            return redirect()->route('login');
        }
    }
    public function index()
    {
        $post_publish = Post::where('post_status', 'Publish')->count();
        $post_draft = Post::where('post_status', 'Draft')->count();
        $post_delete = Post::where('post_status', 'Delete')->count();
        return view('admin.posts.index', compact(
            'post_publish', 'post_draft', 'post_delete'
        ));
    }

    public function datatblePostPublish()
    {
        $fetch = Post::where('post_status', 'Publish')
            ->get()
            ->toArray();

        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $author = User::where('id', $new['author_id'])
                ->first();
            $categories = PostCategory::where('post_id', $new['id'])
                ->join('master_categories as mc', 'mc.id', '=', 'post_categories.master_category_id')
                ->select('name')
                ->get();
            $data_cateories = [];
            foreach($categories as $c){
                $data_cateories[] = $c->name;
            }

            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'post_date' => $this->tgl_indo(Carbon::parse($new['post_date'])->format('Y-m-d')),
                'author' => $author->full_name ?? 'Guest',
                'post_title' => $new['post_title'],
                'post_categories' => implode(", ",$data_cateories),
            ]; 
        }, $fetch);
        
        return DataTables::of($reform)->make(true);
    }

    public function datatblePostDraft()
    {
        $fetch = Post::where('post_status', 'Draft')
            ->get()
            ->toArray();

        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $author = User::where('id', $new['author_id'])
                ->first();
            $categories = PostCategory::where('post_id', $new['id'])
                ->join('master_categories as mc', 'mc.id', '=', 'post_categories.master_category_id')
                ->select('name')
                ->get();
            $data_cateories = [];
            foreach($categories as $c){
                $data_cateories[] = $c->name;
            }

            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'post_date' => $this->tgl_indo(Carbon::parse($new['post_date'])->format('Y-m-d')),
                'author' => $author->full_name ?? 'Guest',
                'post_title' => $new['post_title'],
                'post_categories' => implode(", ",$data_cateories),
            ]; 
        }, $fetch);
        
        return DataTables::of($reform)->make(true);
    }

    public function datatblePostDelete()
    {
        $fetch = Post::where('post_status', 'Delete')
            ->get()
            ->toArray();

        $i = 0;
        $reform = array_map(function($new) use (&$i) { 
            $author = User::where('id', $new['author_id'])
                ->first();
            $categories = PostCategory::where('post_id', $new['id'])
                ->join('master_categories as mc', 'mc.id', '=', 'post_categories.master_category_id')
                ->select('name')
                ->get();
            $data_cateories = [];
            foreach($categories as $c){
                $data_cateories[] = $c->name;
            }

            $i++;
            return [
                'no' => $i.'.',
                'id' => $new['id'],
                'post_date' => $this->tgl_indo(Carbon::parse($new['post_date'])->format('Y-m-d')),
                'author' => $author->full_name ?? 'Guest',
                'post_title' => $new['post_title'],
                'post_categories' => implode(", ",$data_cateories),
            ]; 
        }, $fetch);
        
        return DataTables::of($reform)->make(true);
    }

    public function create()
    {
        $master_categories = MasterCategory::all();
        return view('admin.posts.add_post', compact([
            'master_categories'
        ]));   
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)
            ->first();
        if(!$post){
            return redirect()->route('admin.post');
        }
        $master_categories = MasterCategory::all();
        $data_categories = [];
        foreach($master_categories as $mc){
            $post_category = PostCategory::where('master_category_id', $mc->id)
                ->select('id')
                ->first();
            $data_categories[] = array(
                'id' => $mc->id, 
                'name'  => $mc->name,
                'selected' => ($post_category) ? true : false
            );
        }
        return view('admin.posts.edit_post', compact([
            'master_categories',
            'post',
            'data_categories'
        ]));
    }

    public function uploadImagePost(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
      
            $request->file('upload')->move(public_path('media'), $fileName);
      
            $url = asset('media/' . $fileName);
  
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $lowercase = strtolower($request->post_title);
            $slug = str_replace(' ','-', $lowercase);
            if ($request->hasFile('post_thumbnail')) {
                $image = $request->file('post_thumbnail');
                $imageName = 'post_thumbnail/post_thumbnail_'.time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/post_thumbnail'), $imageName);
            }else{
                return response()->json([
                    'status'    => 'failed', 
                    'code'      => 400, 
                    'message'   => 'Error upload thumbnail!'
                ], 400);
            }

            $store_post = new Post();
            $store_post->author_id = Auth::user()->id;
            $store_post->post_date = $request->post_date;
            $store_post->post_title = $request->post_title;
            $store_post->post_content = $request->post_content;
            $store_post->post_status = $request->post_status;
            $store_post->post_short_desc = $request->short_desc;
            $store_post->post_slug = $slug;
            $store_post->post_thumbnail = $imageName;
            $store_post->save();
            $store_post->fresh();

            foreach(explode(',', $request->post_categories) as $index => $pc){
                $post_category = new PostCategory();
                $post_category->master_category_id = (int)$pc;
                $post_category->post_id = $store_post->id;
                $post_category->save();
            }

            DB::commit();
            return response()->json([
                'status'    => 'success',
                'code'  => 200,
                'message'   => 'Success store post!'
            ]);
        }catch(\Exception $e){

            DB::rollback();
            return response()->json([
                'status'    => 'failed', 
                'code'      => 500, 
                'error' => $e->getMessage(),
                'message'   => 'Something wrong error!'
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try{

            $post = Post::where('id', $id)
                ->first();
            if(!$post){
                return redirect()->route('admin.post');
            }
            $lowercase = strtolower($request->post_title);
            $slug = str_replace(' ','-', $lowercase);
            if ($request->hasFile('post_thumbnail')) {
                $image = $request->file('post_thumbnail');
                $imageName = 'post_thumbnail/post_thumbnail_'.time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/post_thumbnail'), $imageName);
            }else{
                $imageName = null;
            }

            $post->author_id = Auth::user()->id;
            $post->post_date = $request->post_date ?? $post->post_date ;
            $post->post_title = $request->post_title ?? $post->post_title;
            $post->post_short_desc = $request->short_desc ?? $post->post_short_desc;
            $post->post_content = $request->post_content ?? $post->post_content;
            $post->post_status = $request->post_status ?? $post->post_status;
            $post->post_slug = $slug ?? $post->post_slug;
            $post->post_thumbnail = $imageName ?? $post->post_thumbnail;
            $post->save();

            if($request->post_categories){
                PostCategory::where('post_id', $id)->delete();
                foreach(explode(',', $request->post_categories) as $index => $pc){
                    $post_category = new PostCategory();
                    $post_category->master_category_id = (int)$pc;
                    $post_category->post_id = $post->id;
                    $post_category->save();
                }
            }

            DB::commit();
            return response()->json([
                'status'    => 'success',
                'code'  => 200,
                'message'   => 'Success edit post!'
            ]);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json([
                'status'    => 'failed', 
                'code'      => 500, 
                'message'   => 'Something wrong error!'
            ], 500);
        }
    }

    public function delete($id)
    {
        Post::where('id', $id)->update([
            'post_status' => 'Delete'
        ]);
        return response()->json([
            'status'    => 'success', 
            'code'  => 200, 
            'message'   => 'success delete post!'
        ]);
    }

    private function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
}
