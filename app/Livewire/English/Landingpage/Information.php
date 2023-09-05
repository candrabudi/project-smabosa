<?php

namespace App\Livewire\English\Landingpage;

use App\Models\HomeInformation;
use Livewire\Component;

class Information extends Component
{
    public function render()
    {
        $info_first = HomeInformation::where('info_position', 1)
            ->first();
        $info_images = HomeInformation::where('info_position', '!=', 1)
            ->orderby('info_position', 'ASC')
            ->get();
        return view('livewire.english.landingpage.information', [
            'info_first' => $info_first,
            'info_images' => $info_images
        ]);
    }
}
