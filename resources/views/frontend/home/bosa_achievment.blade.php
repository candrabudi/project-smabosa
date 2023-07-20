<section class="latest-news-area section">
    <div class="container">
        <div class="row">
            <div class="latest-news-area section">
                <div class=container>
                    <div class=row>
                        <div class=col-12>
                            <div class=section-title>
                                <h2 class="wow fadeInUp" data-wow-delay=.4s>BERPRESTASI BERSAMA BOSA</h2>
                                <p class="wow fadeInUp" data-wow-delay=.6s>Informasi Tentang Peserta didik, guru, dan Karyawan SMA BOPKRI 1 YOGYAKARTA</p>
                            </div>
                        </div>
                    </div>
                    <div class=row>
                        @foreach($school_achievements as $achievment)
                        <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=.2s>
                                <div class=image>
                                    <a href='#'>
                                        <div class="thumbnail-post" style='background-image: url("{{asset('images/' .$achievment->thumbnail)}}");'>
                                            <div class="thumbnail-content">
                                                <p>
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, perspiciatis.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class=content-body>
                                    <h4 class=title><a href=blog-single-sidebar.html>{{ $achievment->title }}</a></h4>
                                    <p><?php echo substr($achievment->short_desc, 0, 100) ?>....</p>
                                    <div class=button>
                                        <a href="#" class=btn>Read More</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>