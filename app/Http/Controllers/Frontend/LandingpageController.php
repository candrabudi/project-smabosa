<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ImageSlider;
use App\Models\Post;
use App\Models\SchoolAchievement;
use Illuminate\Http\Request;
use DB;

class LandingpageController extends Controller
{
    public function index()
    {
        $image_sliders = ImageSlider::where('status', 'Publish')
            ->get();
        $school_achievements = SchoolAchievement::where('status', 'Publish')
            ->get();
        $articles = Post::where('post_status', 'Publish')
            ->get();
        return view('frontend.index', compact(
            'image_sliders', 'school_achievements', 'articles'
        ));
    }

    public function blog()
    {
        $articles = DB::table('posts')->where('post_status', 'Publish')
            ->orderby('created_at','DESC')
            ->paginate(10);

        $recent_posts = Post::where('post_status', 'Publish')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->take(3);
        return view('frontend.blog', compact([
            'articles','recent_posts'
        ]));
    }
    public function blogDetail($slug)
    {

        $article = Post::where('post_slug', $slug)->first();
        $recent_posts = Post::where('post_status', 'Publish')->get()->take(3);
        return view('frontend.blog_detail', compact('article', 'recent_posts'));
    }
}
