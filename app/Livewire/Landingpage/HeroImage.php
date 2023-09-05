<?php

namespace App\Livewire\Landingpage;

use App\Models\ImageSlider;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class HeroImage extends Component
{
    public function render()
    {
        $cacheKey = env('APP_KEY');

        // Check if the cached content exists
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }
        $view = view('livewire.landingpage.hero-image', [
            'image_sliders' => ImageSlider::where('status', 'Publish')
                ->get()
        ])->render();
        Cache::put($cacheKey, $view, 600);

        return $view;
    }
} 
 