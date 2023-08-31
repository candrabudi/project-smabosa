<?php

namespace App\Livewire\Pages;

use App\Models\BosaPage;
use Livewire\Component;

class InternationalCoperation extends Component
{
    public function render()
    {
        $international_coperation = BosaPage::where('page_name', 'PROGRAM KERJASAMA INTERNASIONAL SMA BOSA YOGYAKARTA')
            ->first();
        return view('livewire.pages.international-coperation', [
            'international_coperation' => $international_coperation
        ]);
    }
}
