<section class="bosa-activity latest-news-area section">
    <div class="container">
        <div class="row">
            <div class="latest-news-area section">
                <div class=container>
                    <div class=row>
                        <div class=col-12>
                            <div class=section-title>
                                <h2 class="wow fadeInUp" data-wow-delay=.4s>Artikel Terbaru</h2>
                                <p class="wow fadeInUp" data-wow-delay=.6s>Informasi Terbaru Berbagai Kegiatan di SMA BOPKRI 1 YOGYAKARTA</p>
                            </div>
                        </div>
                    </div>
                    <div class=row>
                        @foreach($articles as $article)
                        <div class="col-lg-4 col-md-6 col-12 mt-3">

                            <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=.2s>
                                <div class=image>
                                    <div class="thumbnail-post" style='background-image: url("{{ asset('images/'.$article->post_thumbnail) }}");'>
                                        <div class="thumbnail-content">
                                            <p>
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, perspiciatis.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class=content-body>
                                    <div class=meta-data>
                                        <ul>
                                            <li>
                                                <i class="lni lni-calendar"></i>
                                                <a href="javascript:void(0)">{{ \Carbon\Carbon::now()->parse($article->post_date)->isoFormat("dddd, D MMM Y") }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class=title><a href="{{ route('blog.detail', $article->post_slug) }}">
                                        {{ $article->post_title }}
                                        <?php
                                            $count = strlen($article->post_title);
                                            if($count >= 20){
                                                echo substr($article->post_title, 0, 0).'...';
                                            }else{
                                                echo $article->post_title.' '.$count;
                                            }

                                        ?>
                                    </a></h4>
                                    <p><?php echo substr($article->post_short_desc, 0, 100) ?>....</p>
                                    <div class=button>
                                        <a href="{{ route('blog.detail', $article->post_slug) }}" class=btn>Baca</a>
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