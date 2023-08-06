<?php
if (!function_exists('lazyImage')) {
    function lazyImage($url, $alt, $width = null, $height = null) {
        if (pathinfo($url, PATHINFO_EXTENSION) === 'svg') {
            return '<img src="' . $url . '" alt="' . $alt . '" loading="lazy">';
        }else if (pathinfo($url, PATHINFO_EXTENSION) === 'webp') {
            return '<img src="' . $url . '" alt="' . $alt . '" loading="lazy">';
        } else {
            static $config;

            if (!$config) {
                $config = [
                    'driver' => 'gd',
                ];
            }

            $img = Intervention\Image\Facades\Image::cache(function ($image) use ($url, $width, $height) {
                return $image->make($url)->fit($width, $height);
            }, 10, true, $config);

            $encodedImg = $img->encode('jpg', 75);

            $pathInfo = pathinfo($url);
            $dataUri = 'data:image/jpeg;base64,' . base64_encode($encodedImg);

            return '<img src="' . $dataUri . '" alt="' . $alt . '" loading="lazy">';
        }
    }
}
?>