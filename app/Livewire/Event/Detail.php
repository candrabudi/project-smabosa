<?php

namespace App\Livewire\Event;

use App\Models\Event;
use Livewire\Component;

class Detail extends Component
{
    public $eventData;
    public function mount($slug)
    {
        $event = Event::where('status', 'Publish')
            ->where('slug', $slug)
            ->first();
        $this->eventData = $event;
    }
    public function render()
    {
        $event = $this->eventData;
        return view('livewire.event.detail', [
            'event' => $event 
        ]);
    }
}
