<style>
    .thumbnail-post{
        width: 100%;
        height: 200px;
        background-size: cover;
        border: 1px solid #EEE;
    }
    .thumbnail-content{
        width: 100%;
        height: 100%
    }
    .thumbnail-content p{
        opacity: 0;
    }
</style>
<div class="col-lg-8 col-md-7 col-12">
    <div class=row>

        @foreach($articles as $article)
        <div class="col-lg-6 col-12">

            <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=.2s>
                <div class=image>
                    
                    <a href="{{ route('blog.detail', $article->post_slug) }}">
                        <div class="thumbnail-post" style='background-image: url("{{ url('images/'.$article->post_thumbnail) }}");'>
                            <div class="thumbnail-content">
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, perspiciatis.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class=content-body>
                    <div class=meta-data>
                        <ul>
                            <li>
                                <i class="lni lni-tag"></i>
                                @foreach($article->category as $category)
                                    <a href="javascript:void(0)">{{ $category->masterCategory->name }}</a>
                                @endforeach
                            </li>
                            <li>
                                <i class="lni lni-calendar"></i>
                                <a href="javascript:void(0)">{{ \Carbon\Carbon::now()->parse($article->post_date)->isoFormat("dddd, D MMM Y") }}</a>
                            </li>
                        </ul>
                    </div>
                    <h4 class=title><a href="{{ route('blog.detail', $article->post_slug) }}">{{ $article->post_title }}</a></h4>
                    <p><?php echo substr($article->post_short_desc, 0, 150) ?>...</p>
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