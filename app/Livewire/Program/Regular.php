<?php

namespace App\Livewire\Program;

use App\Models\SchoolProgram;
use Livewire\Component;

class Regular extends Component
{
    public function render()
    {
        $school_program = SchoolProgram::where('title', 'PROGRAM REGULER')
            ->first();
        return view('livewire.program.regular', [
            'school_program' => $school_program
        ]);
    }
} 
