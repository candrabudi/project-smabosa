<?php

namespace App\Livewire\English\Activity;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Grid extends Component
{
    use WithPagination;
    public function render()
    {
        $activities = Post::select('posts.*')
            ->join('post_categories as pc', 'pc.post_id', '=', 'posts.id')
            ->join('master_categories as mc', 'mc.id', '=', 'pc.master_category_id')
            ->where('name', 'LIKE', '%kegiatan%')
            ->where('post_status', 'Publish')
            ->where('post_language', 'English')
            ->with('category')
            ->orderby('post_date', 'DESC')
            ->paginate(10);
        return view('livewire.english.activity.grid', [
            'activities' => $activities 
        ]);
    }
}
