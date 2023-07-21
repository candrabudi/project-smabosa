<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('backend/img/logo/logo-bosa.png')}}" />
    <!-- Place favicon.ico in the root directory -->

    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}" />
    <style>
        .hero-area{
            background-size: 100%;
            background-position: right center;
            /* padding: 50px; */
            box-sizing: border-box;
        }
        .hero-area .overlay::before {
            opacity: 0.7;
            background: #081828;
        } 
        .hero-container{
            width: 100%;
        }
        .hero-area .hero-text {
            float: none;
            text-align: center;
            margin-top: 150px !important;
            height: 400px;
        }
        .thumbnail-post{
            width: 100%;
            height: 200px;
            background-size: cover;
            border: 1px solid #EEE;
        }
        .thumbnail-content{
            width: 100%;
            height: 100%
        }
        .thumbnail-content p{
            opacity: 0;
        }

        .thumbnail-post{
            width: 100%;
            height: 200px;
            background-size: cover;
            border: 1px solid #EEE;
        }

        .thumbnail-event{
            width: 100%;
            height: 200px;
            background-size: cover;
            border: 1px solid #EEE;
        }
        @media only screen and (min-width: 330px) and (max-width: 470px) {
            .hero-area{
                overflow: hidden;
                padding: 10px!important;
            }
            .hero-container .hero-inner {
                border-radius: 3px!important;
                width: 100%!important;
                height: 125px!important;
                overflow: hidden;
            }

            .hero-inner .hero-text {
                width: 100%;
                height: 50px !important;
            }
            .hero-area .tns-nav {
                text-align: center;
                position: absolute;
                bottom: 5px!important;
            }
        }
    </style>
    @yield('style')
</head>

<body>