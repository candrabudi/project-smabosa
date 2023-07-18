<style>
    .hero-area{
        background-image: url('/frontend/images/hero/bg-01.jpeg'); 
        background-size: 100%;
        background-position: right center;
        padding: 50px;
        box-sizing: border-box;
    }
    .hero-area .overlay::before {
        opacity: 0.7;
        background: #081828;
    } 
    .hero-container{
        width: 100%;
        border-radius: 10px;
    }
    .hero-area .hero-text {
        float: none;
        text-align: center;
        margin-top: 150px !important;
        height: 200px;
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
<section class="hero-area overlay">
    <div class="hero-slider">
        @foreach($image_sliders as $slider)
        <div class="hero-container">
            <div class="hero-inner" style='background-image: url("{{ asset('images/'.$slider->image) }}");'>
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-8 offset-lg-2 col-md-12 co-12">
                            <div class="home-slider">
                                <div class="hero-text">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>