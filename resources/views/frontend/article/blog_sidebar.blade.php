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
                    <div class="feed-img">
                        <a href=blog-single.html><img src="{{ asset('images/'.$recent->post_thumbnail) }}" alt="#" data-pagespeed-url-hash=1740584850 onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                    </div>
                    <div class=feed-desc>
                        <h6 class=post-title><a href=blog-single.html>{{ $recent->title }}</a>
                        </h6>
                        <span class=time><i class="lni lni-calendar"></i> 05th Nov 2023</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


        <div class="widget categories-widget">
            <h5 class="widget-title">Categories</h5>
            <!-- <ul class=custom>
                <li>
                    <a href="javascript:void(0)">College <span>05</span></a>
                </li>
                <li>
                    <a href="javascript:void(0)">Online Education <span>10</span></a>
                </li>
                <li>
                    <a href="javascript:void(0)">Programming <span>25</span></a>
                </li>
                <li>
                    <a href="javascript:void(0)">Online Course <span>15</span></a>
                </li>
                <li>
                    <a href="javascript:void(0)">University <span>35</span></a>
                </li>
            </ul> -->
        </div>


        <div class="widget popular-tag-widget">
            <h5 class="widget-title">Popular Tags</h5>
            <!-- <div class=tags>
                <a href="javascript:void(0)">Online Courses</a>
                <a href="javascript:void(0)">Design</a>
                <a href="javascript:void(0)">UX</a>
                <a href="javascript:void(0)">Study</a>
                <a href="javascript:void(0)">Usability</a>
                <a href="javascript:void(0)">Tech</a>
                <a href="javascript:void(0)">Html</a>
                <a href="javascript:void(0)">Develop</a>
                <a href="javascript:void(0)">Bootstrap</a>
                <a href="javascript:void(0)">Business</a>
            </div> -->
        </div>

    </div>
</aside>