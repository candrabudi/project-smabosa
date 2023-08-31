<?php

namespace App\Livewire\Achievement;

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
        return view('livewire.achievement.index', [
            'achivements' => $achivements
        ]);
    }
}
