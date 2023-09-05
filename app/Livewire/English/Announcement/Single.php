<?php

namespace App\Livewire\English\Announcement;

use App\Models\Announcement;
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
        return view('livewire.english.announcement.single', [
            'announcement' => $announcement 
        ]);
    }
}
