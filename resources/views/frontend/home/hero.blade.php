<section class="hero-area overlay">
    <div class="hero-slider">
        @foreach($image_sliders as $slider)
        <div class="hero-container">
            <div class="hero-inner" style='
                background-image: url("{{ lazyImageBackground(public_path('images_upload/'.$slider->image)) }}");'
            >
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