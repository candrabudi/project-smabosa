<?php

namespace App\Livewire\Landingpage;

use App\Models\ImageSlider;
use Livewire\Component;

class HeroImage extends Component
{
    public function render()
    {
        return view('livewire.landingpage.hero-image', [
            'image_sliders' => ImageSlider::where('status', 'Publish')
                ->get()
        ]);
    }
} 
 