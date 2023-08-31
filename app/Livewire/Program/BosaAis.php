<?php

namespace App\Livewire\Program;

use App\Models\SchoolProgram;
use Livewire\Component;

class BosaAis extends Component
{
    public function render()
    {
        $school_program = SchoolProgram::where('title', 'BOSA-AIS EDUCATIONAL PROGRAM')
            ->first();
        return view('livewire.program.bosa-ais', [
            'school_program' => $school_program
        ]);
    }
}
