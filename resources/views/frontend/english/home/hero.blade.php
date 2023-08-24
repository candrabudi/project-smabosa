
<style>
    .hero-area {
        background-size: 100%;
        background-position: right center;
        box-sizing: border-box;
        background: #fff;
    }
    .hero-inner img{ 
        margin-top: 20px;
    }
    .hero-inner {
        height: auto!important;
        /* padding-bottom: 50px; */
        box-sizing: border-box;
        background-color: #fff;
    }
    .hero-area .overlay::before {
        opacity: 0.7;
    }

    .hero-container {
        width: 100%;
    }

    .hero-area .hero-text {
        float: none;
        text-align: center;
        margin-top: 150px !important;
        height: 400px;
    }

    .thumbnail-post {
        width: 100%;
        height: 200px;
        background-size: cover;
        border: 1px solid #EEE;
    }

    .thumbnail-content {
        width: 100%;
        height: 100%
    }

    .thumbnail-content p {
        opacity: 0;
    }

    .thumbnail-post {
        width: 100%;
        height: 200px;
        background-size: cover;
        border: 1px solid #EEE;
    }

    .thumbnail-event {
        width: 100%;
        height: 200px;
        background-size: cover;
        border: 1px solid #EEE;
    }

    .box-contact i {
        font-size: 15px;
        vertical-align: middle;
    }

    .box-contact i+span {
        margin-left: 10px;
    }

    .box-contact {
        width: 100%;
        background-color: #DDD;
    }

    .box-contact span {
        color: #000;
    }

    .box-icon {
        width: 35px;
        padding: 10px;
        text-align: center;
        line-height: 60px;
        display: inline-block;
        background-color: #375bcd;
        border-radius: 4px;
        color: #fff;
    }

    .image-facility img {
        width: 50%;
    }
</style>
<section class="hero-area overlay">
    <div class="hero-slider">
        @foreach($image_sliders as $slider)
            <div class="hero-container">
                <div class="hero-inner">
                    <img src="{{ asset('images_upload/'.$slider->image) }}" class="img-fluid" alt="...">
                </div>
            </div>
        @endforeach
    </div>
</section>