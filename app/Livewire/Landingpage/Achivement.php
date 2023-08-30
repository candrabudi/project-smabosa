<?php

namespace App\Livewire\Landingpage;

use App\Models\Event;
use App\Models\Post;
use App\Models\SchoolAchievement;
use Livewire\Component;
use Livewire\WithPagination;

class Achivement extends Component
{
    use WithPagination;
    public function render()
    {
        $articles = Post::where('post_status', 'Publish')
            ->orderBy('post_date', 'DESC')
            ->get()
            ->take(3);
        $events = Event::where('status', 'Publish')
            ->get()
            ->take(2);
        $activities = Post::select('posts.*')
            ->join('post_categories as pc', 'pc.post_id', '=', 'posts.id')
            ->join('master_categories as mc', 'mc.id', '=', 'pc.master_category_id')
            ->where('name', 'LIKE', '%kegiatan%')
            ->where('post_status', 'Publish')
            ->with('category')
            ->orderby('post_date', 'DESC')
            ->paginate(3);
        $school_achievements = SchoolAchievement::where('status', 'Publish')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->take(3);
        return view('livewire.landingpage.achivement',[
            'articles' => $articles,
            'events' => $events,
            'activities' => $activities,
            'school_achievements' => $school_achievements,
        ]);
    }
}
