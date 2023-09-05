<?php

namespace App\Livewire\English\Achievement;

use App\Models\SchoolAchievement;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $achivements = SchoolAchievement::where('status', 'Publish')
            ->paginate(10);
        return view('livewire.english.achievement.index', [
            'achivements' => $achivements 
        ]);
    }
}
