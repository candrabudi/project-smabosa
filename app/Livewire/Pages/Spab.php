<?php

namespace App\Livewire\Pages;

use App\Models\BosaPage;
use Livewire\Component;

class Spab extends Component
{
    public function render()
    {
        $spab = BosaPage::where('page_name', 'SPAB')
            ->first();
        return view('livewire.pages.spab', [
            'spab' => $spab
        ]);
    }
}
