<div>
    <livewire:english.layout.header />
    <section class="section blog-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="single-inner">
                        <div class="post-thumbnils">
                            <img src="{{ asset('images_upload/'.$facility->thumbnail) }}" alt="#" data-pagespeed-url-hash="1974793277" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        </div>
                        <div class="post-details">
                            <div class="content-blog detail-inner">
                                <?php echo $facility->content ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <livewire:english.layout.footer />
</div>