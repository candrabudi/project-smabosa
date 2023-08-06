@section('style')
<style>
    .content-blog ul{
        list-style-type: circle;
        margin-left: 20px;
        display: block;
    }
    .ck-widget_with-resizer{
        display: inline-block;
        min-width: 10%;
        max-width: 100%;
    }
    .ck-widget_with-resizer img{
        min-width: 10%;
        max-width: 100%;
        margin-right: 20px;
    }
</style>
@endsection
@inject('carbon', 'Carbon\Carbon')
<section class="section blog-single">
    <div class=container>
        <div class=row>
            <div class="col-lg-8 col-12">
                <div class=single-inner>
                    <div class=post-thumbnils>
                        <img src="{{ asset('images/'.$article->post_thumbnail) }}" alt="#" data-pagespeed-url-hash=1974793277 onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                    </div>
                    <div class=post-details>
                        <div class=detail-inner>

                            <ul class="custom-flex post-meta">
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-calendar"></i>
                                        {{ $carbon::parse($article->created_at)->format('d, M y')}}
                                    </a>
                                </li>
                            </ul>
                            <h2 class=post-title>
                                <a href="javascript:void(0)">{{$article->post_title}}</a>
                            </h2>

                            <div class="content-blog mt-3" style="list-style-type: circle;">
                                <?php echo $article->post_content ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('frontend.article.blog_sidebar')
        </div>
    </div>
</section>
<script>
    var elements = document.getElementsByClassName("ck-reset_all");

    for (var i = 0; i < elements.length; i++) {
    var element = elements[i];
        element.style.display = "none";
    }
</script>