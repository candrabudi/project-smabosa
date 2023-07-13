<style>
    .hero-area .hero-text {
        float: none;
        text-align: center;
        margin-top: 150px !important;
        height: 300px;
    }

    @media only screen and (min-width: 390px) and (max-width: 470px) {
        .hero-inner {
            width: 100%;
            background-size: contain;
            min-height: 135px!important;
        }

        .hero-inner .hero-text {
            width: 100%;
            height: 50px !important;
        }
    }
</style>
<section class="hero-area">
    <div class="hero-slider">
        @foreach($image_sliders as $slider)
        <div class="hero-inner" style='background-image: url("{{ asset('image_slider/'.$slider->image) }}");'>
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
        @endforeach
    </div>
</section>