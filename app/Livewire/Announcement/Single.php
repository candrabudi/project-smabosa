<?php

namespace App\Livewire\Announcement;

use App\Models\Announcement;
use App\Models\Post;
use Livewire\Component;

class Single extends Component
{
    public $dataPost;
    public function mount($slug)
    {
        $announcement = Announcement::where('slug', $slug)->first();
        $this->dataPost = $announcement;
    }
    public function render()
    {
        $announcement = $this->dataPost;
        return view('livewire.announcement.single', [
            'announcement' => $announcement
        ]);
    }
}
