<?php

namespace App\Livewire\Event;

use App\Models\Event;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $events = Event::where('status', 'Publish')
            ->orderBy('event_date', 'DESC')
            ->get();
        return view('livewire.event.index', [
            'events' => $events
        ]);
    } 
}
