<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        config(['app.locale' => 'id']);
	    Carbon::setLocale('id');
        // Blade::directive('lazyImage', function ($expression) {
        //     Log::info($expression);
        //     // list($path, $alt, $width, $height) = explode(',', str_replace(['(', ')', ' ', '\''], '', $expression));
        //     // $img = Image::cache(function ($image) use ($path, $width, $height) {
        //     //     return $image->make($path)->fit($width, $height);
        //     // }, 10, true);
    
        //     // $dataUri = 'data:image/' . pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode($img->encode());
    
        //     // return '<img src="' . $dataUri . '" alt="' . $alt . '" loading="lazy">';
        // });
        Blade::component('lazyimage', LazyImage::class);
    }
}
