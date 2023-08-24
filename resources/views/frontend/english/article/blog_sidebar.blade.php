<style>
    .feed-img p{
        opacity: 0;
    }

</style>
<aside class="col-lg-4 col-md-5 col-12">
    <div class=sidebar>

        <div class="widget search-widget">
            <h5 class="widget-title">Search Here</h5>
            <form action="#">
                <input type=text placeholder="Search Here...">
                <button type=submit><i class="lni lni-search-alt"></i></button>
            </form>
        </div>


        <div class="widget popular-feeds">
            <h5 class="widget-title">Recent Posts</h5>
            <div class="popular-feed-loop">
                @foreach($recent_posts as $recent)
                <div class="single-popular-feed">
                    <div class="feed-img" style='background-image: url("{{ url('images_upload/'.$recent->post_thumbnail) }}");'>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit, reiciendis.
                        </p>
                    </div>
                    <div class=feed-desc>
                        <h6 class=post-title><a href="{{route('blog.detail', $recent->post_slug)}}">{{ $recent->post_title }}</a>
                        </h6>
                        <span class=time><i class="lni lni-calendar"></i> {{ \Carbon\Carbon::now()->parse($recent->post_date)->isoFormat("dddd, D MMM Y") }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</aside>