<?php

namespace App\Livewire\Facility;

use App\Models\Facility;
use Livewire\Component;

class Detail extends Component
{
    public $dataFacility;
    public function mount($slug)
    {
        $facility = Facility::where('status', 'Publish')
            ->where('slug', $slug)
            ->first();
        $this->dataFacility = $facility;
    }
    public function render()
    {
        $facility = $this->dataFacility;
        return view('livewire.facility.detail', [
            'facility' => $facility
        ]);
    }
}
