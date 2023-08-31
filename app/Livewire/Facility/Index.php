<?php

namespace App\Livewire\Facility;

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
        return view('livewire.facility.index', [
            'facilities' => $facilities,
        ]); 
    }
}
