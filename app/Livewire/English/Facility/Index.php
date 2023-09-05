<?php

namespace App\Livewire\English\Facility;

use App\Models\Facility;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $facilities = Facility::where('status', 'Publish')
            ->paginate(4);
        return view('livewire.english.facility.index', [
            'facilities' => $facilities,
        ]); 
    }
}
