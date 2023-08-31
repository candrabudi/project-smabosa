<?php

namespace App\Livewire\AboutSchool;

use App\Models\AboutSchool;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $about = AboutSchool::where('language', 'Indonesia')
            ->first();
        return view('livewire.about-school.index', [
            'about' => $about 
        ]);
    }
}
