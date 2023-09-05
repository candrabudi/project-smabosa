<?php

namespace App\Livewire\English\Blog;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Grid extends Component
{
    use WithPagination;
    public function render()
    {
        $articles = Post::where('post_status', 'Publish')
            ->where('post_language', 'English')
            ->with('category')
            ->orderby('post_date', 'DESC')
            ->paginate(10);
        return view('livewire.english.blog.grid', [
            'articles' => $articles 
        ]);
    }
}
