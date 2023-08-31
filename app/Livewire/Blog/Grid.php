<?php

namespace App\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Grid extends Component
{
    use WithPagination;
    public function render()
    {
        $articles = Post::where('post_status', 'Publish')
            ->with('category')
            ->orderby('post_date', 'DESC')
            ->paginate(10);
        return view('livewire.blog.grid', [
            'articles' => $articles
        ]);
    }
}
