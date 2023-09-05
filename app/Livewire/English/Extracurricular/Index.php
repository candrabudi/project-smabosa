<?php

namespace App\Livewire\English\Extracurricular;

use App\Models\Extracurricular;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $extracurriculars = Extracurricular::where('status', 'Publish')
            ->paginate(10);
        return view('livewire.english.extracurricular.index', [
            'extracurriculars' => $extracurriculars
        ]);
    } 
}
