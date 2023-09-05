<?php

namespace App\Livewire\English\Facility;

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
        return view('livewire.english.facility.detail', [
            'facility' => $facility 
        ]);
    }
}
