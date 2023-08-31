<?php

namespace App\Livewire\Achievement;

use App\Models\SchoolAchievement;
use Livewire\Component;

class Detail extends Component
{
    public $dataAchievement;
    public function mount($slug)
    {
        $achivement = SchoolAchievement::where('slug', $slug)
            ->where('status', 'Publish')
            ->first();
        $this->dataAchievement = $achivement;
    }
    public function render()
    {
        $achivement = $this->dataAchievement;
        return view('livewire.achievement.detail', [
            'achivement' => $achivement 
        ]);
    }
}
