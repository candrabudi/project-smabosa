<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('meta_description')
    <link rel="icon" type="image/x-icon" href="{{ asset('asset_be/img/logo/logo-bosa.webp') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="stylesheet" href="{{ asset('asset_fe/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_fe/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_fe/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_fe/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_fe/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_fe/css/main2.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/floating_whatsapp.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_fe/css/faw/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_fe/css/hero.css') }}" />
    <link rel="stylesheet" href="{{ asset('asset_fe/css/faw/css/v5-font-face.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="google-site-verification" content="4OXKjT6p5yIC16XGf4zcQ-RAFKbQhs9FDT3DS07q14U" />
    @livewireStyles
    <title>@yield('title')</title>
</head>

<body>
    <div style="margin-top: 150px;"></div>
    {{ $slot }}
    <div class="floating_btn">
        <a target="_blank" href="https://api.whatsapp.com/send/?phone=628989283238">
            <div class="contact_icon">
                <img src="{{asset('images/logo_whatsapp.png')}}" width="140" />
            </div>
        </a>
    </div>
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>
    <script src="{{ mix('js/app.js') }}" async></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/tiny-slider.js') }}"></script>
    <script src="{{ asset('js/glightbox.min.js') }}"></script>
    <script src="https://use.fontawesome.com/b21714c392.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
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
    <script>
        var elements = document.getElementsByClassName("ck-reset_all");

        for (var i = 0; i < elements.length; i++) {
            var element = elements[i];
            element.style.display = "none";
        }
    </script>
    <script>
        $(document).ready(function() {
            // Remove the class "ck-editor__editable" from the element
            $(".ck-editor__editable").removeClass("ck-editor__editable");
            $(".ck-editor__nested-editable").removeClass("ck-editor__nested-editable");
            $("td").removeAttr("contenteditable");
            $("td").removeAttr("class");
            $("td").removeAttr("role");
            $("th").removeAttr("contenteditable");
            $("th").removeAttr("class");
            $("th").removeAttr("role");
            $("figure").removeClass("table ck-widget ck-widget_with-selection-handle");
        });
    </script>
    @livewireScripts
</body>

</html>