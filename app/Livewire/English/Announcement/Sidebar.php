<?php

namespace App\Livewire\English\Announcement;

use App\Models\Post;
use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        $recent_posts = Post::where('post_status', 'Publish')
            ->where('post_language', 'English')
            ->orderBy('post_date', 'DESC')
            ->get()
            ->take(10);
        return view('livewire.english.announcement.sidebar', [
            'recent_posts' => $recent_posts 
        ]);
    }
}