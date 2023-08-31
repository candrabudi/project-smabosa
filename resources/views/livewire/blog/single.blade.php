<div>
<livewire:layout.header/>
    <section class="section blog-single">
        <div class=container>
            <div class=row>
                <div class="col-lg-8 col-12">
                    <div class=single-inner>
                        <div class=post-thumbnils>
                            <img src="{{ asset('images_upload/'.$article->post_thumbnail) }}" alt="#" data-pagespeed-url-hash=1974793277 onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        </div>
                        <div class=post-details>
                            <div class=detail-inner>
    
                                <ul class="custom-flex post-meta">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-calendar"></i>
                                            {{ tanggal_indonesia($article->created_at)}}
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
                <livewire:blog.sidebar />
            </div>
        </div>
    </section>
    <livewire:layout.footer/>
</div>