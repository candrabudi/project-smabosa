<?php

namespace App\Livewire\English\AboutSchool;

use App\Models\AboutSchool;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $about = AboutSchool::where('language', 'English')
            ->first();
        return view('livewire.english.about-school.index', [
            'about' => $about
        ]);
    }
}
