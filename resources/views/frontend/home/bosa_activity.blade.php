<section class="bosa-activity latest-news-area section">
    <div class="container">
        <div class="row">
            <div class="latest-news-area section">
                <div class=container>
                    <div class=row>
                        <div class=col-12>
                            <div class=section-title>
                                <h2 class="wow fadeInUp" data-wow-delay=.4s>Kegiatan Bosa</h2>
                                <p class="wow fadeInUp" data-wow-delay=.6s>Informasi Terbaru Berbagai Kegiatan di SMA BOPKRI 1 YOGYAKARTA</p>
                            </div>
                        </div>
                    </div>
                    <div class=row>
                        @foreach($activitySchool as $activity)
                        <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=.2s>
                                <div class=image>
                                    <a href=blog-single-sidebar.html><img class=thumb src="{{asset('images/activities/' .$activity->thumbnail)}}" alt="#" data-pagespeed-url-hash=4204970080 onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                                </div>
                                <div class=content-body>
                                    <div class=meta-data>
                                        <ul>
                                            <li>
                                                <i class="lni lni-calendar"></i>
                                                <a href="javascript:void(0)">January 25, 2023</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class=title><a href=blog-single-sidebar.html>{{ $activity->title }}</a></h4>
                                    <p><?php echo substr($activity->short_desc, 0, 100) ?>....</p>
                                    <div class=button>
                                        <a href="{{ route('activity.detail', $activity->slug)}}" class=btn>Read More</a>
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