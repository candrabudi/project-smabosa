<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutSchool;
use App\Models\Event;
use App\Models\HomeInformation;
use App\Models\ImageSlider;
use App\Models\Post;
use App\Models\SchoolAchievement;
use Illuminate\Http\Request;

class EnLandingpageController extends Controller
{
    public function index()
    {
        $image_sliders = ImageSlider::where('language', 'English')
            ->where('status', 'Publish')
            ->get();
        $school_achievements = SchoolAchievement::where('language', 'English')
            ->where('status', 'Publish')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->take(3);
        $articles = Post::where('post_language', 'English')
            ->where('post_status', 'Publish')
            ->orderBy('post_date', 'DESC')
            ->get()
            ->take(3);
        $events = Event::where('language', 'English')
            ->where('status', 'Publish')
            ->get()
            ->take(2);
        $activities = Post::select('posts.*')
            ->join('post_categories as pc', 'pc.post_id', '=', 'posts.id')
            ->join('master_categories as mc', 'mc.id', '=', 'pc.master_category_id')
            ->where('name', 'LIKE', '%kegiatan%')
            ->where('post_status', 'Publish')
            ->where('language', 'English')
            ->with('category')
            ->orderby('post_date', 'DESC')
            ->paginate(3);
        $info_first = HomeInformation::where('info_lang', 'English')
            ->where('info_position', 1)
            ->first();
        $info_images = HomeInformation::where('info_lang', 'English')
            ->where('info_position', '!=', 1)
            ->orderby('info_position', 'ASC')
            ->get();
        $about = AboutSchool::where('language', 'English')
            ->first();
        if (count($events) > 1) {
            $eventLasts = Event::where('status', 'Publish')
                ->whereDate('event_date', '<', $events['1']['event_date'])
                ->where('id', '!=', $events['1']['id'])
                ->where('language', 'English')
                ->orderBy('event_date', 'DESC')
                ->get()
                ->take(2);
        } else {
            $eventLasts = [];
        }
        return view('frontend.english.index', compact(
            'image_sliders',
            'school_achievements',
            'articles',
            'events',
            'eventLasts',
            'about',
            'activities',
            'info_first',
            'info_images'
        ));
    }

    public function about()
    {
        $about = AboutSchool::where('language', 'english')
            ->first();
        return view('frontend.english.about.index', compact('about'));
    }
}
