<div class="col-lg-8 col-md-7 col-12">
    <div class=row>

        @foreach($articles as $article)
        <div class="col-lg-6 col-12">

            <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=.2s>
                <div class=image>
                    <a href=blog-single-sidebar.html><img class=thumb src="{{ url('images/'.$article->post_thumbnail) }}" alt="#" data-pagespeed-url-hash=4204970080 onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                </div>
                <div class=content-body>
                    <div class=meta-data>
                        <ul>
                            <li>
                                <i class="lni lni-tag"></i>
                                <a href="javascript:void(0)">{{ $article->post_title }}</a>
                            </li>
                            <li>
                                <i class="lni lni-calendar"></i>
                                <a href="javascript:void(0)">January 25, 2023</a>
                            </li>
                        </ul>
                    </div>
                    <h4 class=title><a href=blog-single-sidebar.html>{{ $article->post_title }}</a></h4>
                    <p><?php echo substr($article->post_title, 0, 150) ?>...</p>
                    <div class=button>
                        <a href="{{ route('blog.detail', $article->post_slug) }}" class=btn> Baca Lebih Lanjut</a>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
        {{ $articles->links('frontend.layouts.paginate') }}
    </div>
</div>