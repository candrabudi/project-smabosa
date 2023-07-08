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
                        @foreach($articles_achievment as $achievment)
                        <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=.2s>
                                <div class=image>
                                    <a href=blog-single-sidebar.html><img class=thumb src="{{asset('images/berita/' .$achievment->thumbnail)}}" alt="#" data-pagespeed-url-hash=4204970080 onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                                </div>
                                <div class=content-body>
                                    <div class=meta-data>
                                        <ul>
                                            <li>
                                                <i class="lni lni-tag"></i>
                                                <a href="javascript:void(0)">{{ $achievment->ArticleCategory->name }}</a>
                                            </li>
                                            <li>
                                                <i class="lni lni-calendar"></i>
                                                <a href="javascript:void(0)">January 25, 2023</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class=title><a href=blog-single-sidebar.html>{{ $achievment->title }}</a></h4>
                                    <p><?php echo substr($achievment->short_desc, 0, 100) ?>....</p>
                                    <div class=button>
                                        <a href="{{ route('blog.detail', $achievment->slug)}}" class=btn>Read More</a>
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