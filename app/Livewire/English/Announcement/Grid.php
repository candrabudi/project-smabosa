<?php

namespace App\Livewire\English\Announcement;

use App\Models\Announcement;
use Livewire\Component;
use Livewire\WithPagination;

class Grid extends Component
{
    use WithPagination;
    public function render()
    {
        $announcements = Announcement::where('status', 'Publish')
            ->orderby('created_at', 'DESC')
            ->paginate(10);
        return view('livewire.english.announcement.grid', [
            'announcements' => $announcements 
        ]);
    }
}
