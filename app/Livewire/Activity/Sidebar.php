<?php

namespace App\Livewire\Activity;

use App\Models\Post;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        $recent_activities = Post::join('post_categories as pc', 'pc.post_id', '=', 'posts.id')
            ->join('master_categories as mc', 'mc.id', '=', 'pc.master_category_id')
            ->where('name', 'LIKE', '%kegiatan%')
            ->where('post_status', 'Publish')
            ->orderBy('post_date', 'DESC')
            ->get()
            ->take(10);
        return view('livewire.activity.sidebar', [
            'recent_activities' => $recent_activities
        ]);
    }
}
