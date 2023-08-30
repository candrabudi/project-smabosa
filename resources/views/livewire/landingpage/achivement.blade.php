<div>
    <section class="latest-news-area section">
        <div class="container">
            <div class="row">
                <div class=container>
                    <div class=row>
                        <div class=col-12>
                            <div class=bosa-title>
                                <h2 class="wow fadeInUp" data-wow-delay=.4s>KEGIATAN B<span style="color: #d7292a">O</span>SA</h2>
                                <h3 class="wow fadeInUp" data-wow-delay=.6s>Informasi Terbaru tentang berbagai macam kegiatan di SMA BOPKRI 1 Yogyakarta</h3>
                            </div>
                        </div>
                    </div>
                    <div class=row>
                        @foreach($activities as $activity)
                        <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=.2s>
                                <div class=image>
                                    <a href='#'>
                                        <div class="thumbnail-post" loading="lazy" style='
                                        background-image: url("{{ asset('images_upload/'.$activity->post_thumbnail)}}");
                                    '>
                                            <div class="thumbnail-content">
                                                <p>
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, perspiciatis.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <h4 class=content-title><a href="{{ route('blog.detail', $activity->post_slug) }}">{{ $activity->post_title }}</a></h4>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class=container>
                    <div class=row>
                        <div class=col-12>
                            <div class=bosa-title>
                                <h2 class="wow fadeInUp" data-wow-delay=.4s>BERPRESTASI BERSAMA B<span style="color: #d7292a">O</span>SA</h2>
                                <h3 class="wow fadeInUp" data-wow-delay=.6s>Informasi tentang peserta didik, guru, dan karyawan SMA BOPKRI 1 Yogyakarta yang mendapatkan kejuaraan dan penghargaan dibidang akademik dan non-akademik</h3>
                            </div>
                        </div>
                    </div>
                    <div class=row>
                        @foreach($school_achievements as $achievment)
                        <div class="col-lg-4 col-md-6 col-12">

                            <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=.2s>
                                <div class=image>
                                    <a href='#'>
                                        <div class="thumbnail-post" loading="lazy" style='
                                        background-image: url("{{asset('images_upload/'.$achievment->thumbnail)}}");
                                    '>
                                            <div class="thumbnail-content">
                                                <p>
                                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, perspiciatis.
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <h4 class="content-title"><a href="{{route('achivement.detail', $achievment->slug)}}">{{ $achievment->title }}</a></h4>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>