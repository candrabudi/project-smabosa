<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('asset_be/img/logo/logo-bosa.webp') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('asset_fe/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('asset_fe/css/LineIcons.2.0.css') }}"/>
    <link rel="stylesheet" href="{{ asset('asset_fe/css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ asset('asset_fe/css/tiny-slider.css') }}"/>
    <link rel="stylesheet" href="{{ asset('asset_fe/css/glightbox.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('asset_fe/css/main2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('asset_fe/css/responsive.css') }}"/>
    <link rel="stylesheet" href="{{ asset('asset_fe/css/faw/css/all.css') }}"/>
    <link rel="stylesheet" href="{{ asset('asset_fe/css/custom_menu2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('asset_fe/css/hero.css') }}"/>
    <link rel="stylesheet" href="{{ asset('asset_fe/css/faw/css/v5-font-face.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    <title>{{ $title ?? 'SMABOSA' }}</title>
</head>
<body>
    <div style="margin-top: 150px;"></div>
    {{ $slot }}
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('asset_fe/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('asset_fe/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('asset_fe/js/main.js') }}"></script>
    <script src="https://use.fontawesome.com/b21714c392.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            tns({
                container: '.hero-slider',
                items: 1,
                slideBy: 'page',
                autoplay: false,
                mouseDrag: true,
                gutter: 0,
                nav: true,
                controls: false,
                controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
            });

            tns({
                container: '.client-logo-carousel',
                slideBy: 'page',
                autoplay: true,
                autoplayButtonOutput: false,
                mouseDrag: true,
                gutter: 15,
                nav: false,
                controls: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    540: {
                        items: 3,
                    },
                    768: {
                        items: 4,
                    },
                    992: {
                        items: 4,
                    },
                    1170: {
                        items: 6,
                    }
                }
            });

            const lazyImage = document.querySelector('[x-ref="lazyImage"]');
            if (lazyImage) {
                lazyImage.setAttribute('loading', 'lazy');
            }
        });
    </script>
    @livewireScripts
</body>
</html>
