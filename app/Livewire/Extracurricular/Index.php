<?php

namespace App\Livewire\Extracurricular;

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
        return view('livewire.extracurricular.index', [
            'extracurriculars' => $extracurriculars
        ]);
    }
}
