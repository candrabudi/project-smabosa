<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutSchool;
use App\Models\Event;
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
            ->orderBy('created_at', 'DESC')
            ->get()
            ->take(3);
        $articles = Post::where('post_status', 'Publish')
            ->orderBy('post_date', 'DESC')
            ->get()
            ->take(3);
        $events = Event::where('status', 'Publish')
            ->get()
            ->take(2);
        $activities = Post::select('posts.*')
            ->join('post_categories as pc', 'pc.post_id','=', 'posts.id' )
            ->join('master_categories as mc', 'mc.id', '=', 'pc.master_category_id')
            ->where('name', 'LIKE', '%kegiatan%')
            ->where('post_status', 'Publish')
            ->with('category')
            ->orderby('post_date','DESC')
            ->paginate(3);
        $about = AboutSchool::first();
        if(count($events) > 1){
            $eventLasts = Event::where('status', 'Publish')
                ->whereDate('event_date', '<', $events['1']['event_date'])
                ->where('id', '!=', $events['1']['id'])
                ->orderBy('event_date', 'DESC')
                ->get()
                ->take(2);
        }else{
            $eventLasts = [];
        }
        return view('frontend.index', compact(
            'image_sliders', 'school_achievements', 'articles', 'events', 'eventLasts', 'about', 'activities'
        ));
    }

    public function blog()
    {
        $articles = Post::where('post_status', 'Publish')
            ->with('category')
            ->orderby('post_date','DESC')
            ->paginate(10);

        $recent_posts = Post::where('post_status', 'Publish')
            ->orderBy('post_date', 'DESC')
            ->get()
            ->take(10);
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

    public function about()
    {
        $about = AboutSchool::first();
        return view('frontend.about.index', compact('about'));
    }

    public function event()
    {
        $events = Event::where('status', 'Publish')
            ->orderBy('event_date', 'DESC')
            ->get();
        return view('frontend.event.index', compact('events'));
    }

    public function Activity()
    {
        $activities = Post::select('posts.*')
            ->join('post_categories as pc', 'pc.post_id','=', 'posts.id' )
            ->join('master_categories as mc', 'mc.id', '=', 'pc.master_category_id')
            ->where('name', 'LIKE', '%kegiatan%')
            ->where('post_status', 'Publish')
            ->with('category')
            ->orderby('post_date','DESC')
            ->paginate(10);

        $recent_activities = Post::join('post_categories as pc', 'pc.post_id','=', 'posts.id' )
            ->join('master_categories as mc', 'mc.id', '=', 'pc.master_category_id')
            ->where('name', 'LIKE', '%kegiatan%')
            ->where('post_status', 'Publish')
            ->orderBy('post_date', 'DESC')
            ->get()
            ->take(10);
        return view('frontend.activity.index', compact([
            'activities','recent_activities'
        ]));
    }
}
