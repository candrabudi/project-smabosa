<?php

namespace App\Livewire\Extracurricular;

use App\Models\Extracurricular;
use Livewire\Component;

class Detail extends Component
{
    public $dataExtra;
    public function mount($slug)
    {
        $extracurricular = Extracurricular::where('slug', $slug)
            ->where('status', 'Publish')
            ->first();
        $this->dataExtra = $extracurricular;
    }
    public function render()
    {
        $extracurricular = $this->dataExtra;
        return view('livewire.extracurricular.detail', [
            'extracurricular' => $extracurricular
        ]);
    }
}
