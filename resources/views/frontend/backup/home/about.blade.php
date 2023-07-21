<section class="about-us section" style="background-color: #fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="about-left">
                    <div class="about-title align-left">
                        <span class="wow fadeInDown" data-wow-delay=".2s">Apa itu Smabosa Bopkri 1 Yogyakarta</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">{{ $about->title ?? '' }}</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo $about->short_desc ?? '' ?></p>
                        <div class="button wow fadeInUp" data-wow-delay="1s">
                            <a href="about-us.html" class="btn">Peserta Didik</a>
                            <a href="about-us.html" class="btn">Guru</a>
                            <a href="about-us.html" class="btn">Bosa-ais</a>
                            <a href="about-us.html" class="btn">Fasilitas</a>
                            <!-- <a href="https://www.youtube.com/watch?v=r44RKWyfcFw&fbclid=IwAR21beSJORalzmzokxDRcGfkZA1AtRTE__l5N4r09HcGS5Y6vOluyouM9EM" class="glightbox video btn"> Play Video<i class="lni lni-play"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about-right wow fadeInRight" data-wow-delay=".4s">
                    <img src="{{ !empty($about) ? asset('images/'.$about->thumbnail) : 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg' }}" alt="#">
                </div>
            </div>
        </div>
    </div>
</section>