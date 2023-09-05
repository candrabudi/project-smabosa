<?php

namespace App\Livewire\English\Landingpage;

use App\Models\ImageSlider;
use Livewire\Component;

class HeroImage extends Component
{
    public function render()
    {
        return view('livewire.english.landingpage.hero-image', [
            'image_sliders' => ImageSlider::where('status', 'Publish')
                ->where('language', 'English')
                ->get()
        ]);
    }
}
