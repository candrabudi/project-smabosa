<?php

namespace App\Livewire\English\Blog;

use App\Models\Post;
use Livewire\Component;

class Single extends Component
{
    public $dataPost;
    public function mount($slug)
    {
        $article = Post::where('post_slug', $slug)->first();
        $this->dataPost = $article;
    }
    public function render()
    {
        $article = $this->dataPost;
        $recent_posts = Post::where('post_status', 'Publish')
            ->where('post_language', 'English')
            ->get()
            ->take(10);
        return view('livewire.english.blog.single', [
            'article' => $article,
            'recent_posts' => $recent_posts
        ]); 
    }
}
