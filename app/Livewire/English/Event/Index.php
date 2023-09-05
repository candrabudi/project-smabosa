<?php

namespace App\Livewire\English\Event;

use App\Models\Event;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $events = Event::where('status', 'Publish')
            ->where('language', 'English')
            ->orderBy('event_date', 'DESC')
            ->get();
            
        return view('livewire.english.event.index', [
            'events' => $events
        ]);
    }
}
