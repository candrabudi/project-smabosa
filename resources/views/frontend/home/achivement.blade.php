<style>
    .bosa-title{
        margin-bottom: 20px;
    }
    .bosa-title h2{
        width: 50%;
        box-sizing: border-box;
        background-color: #375bcd;
        font-size: 35px;
        padding: 10px;
        border-radius: 8px;
        line-height: 40px;
        text-transform: capitalize;
        position: relative;
        font-weight: 700;
        color: #fff;
    }
    .bosa-title h3{
        text-align: left;
        font-weight: 400;
        font-size: 20px;
        margin-top: 10px;
    }
    .content-title{
        width: 100%;
        padding: 20px;
        box-sizing: border-box;
        color: #375bcd;
        background-color: #FFF000;
        font-size: 20px;
    }
    .content-title a:hover{
        color: #000;
    } 
    @media only screen and (min-width: 330px) and (max-width: 470px) {
        .bosa-title h2{
            width: 100%;
            box-sizing: border-box;
            background-color: #375bcd;
            font-size: 22px;
            padding: 10px;
            border-radius: 8px;
            line-height: 40px;
            text-transform: capitalize;
            position: relative;
            font-weight: 700;
            color: #fff;
        }
        .bosa-title h3{
            text-align: left;
            font-weight: 400;
            font-size: 16px;
            margin-top: 10px;
        }
    }
</style>
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
                                    <div class="thumbnail-post" data-pagespeed-url-hash="814022818" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" style='background-image: url("{{ asset('images_upload/' .$activity->post_thumbnail)}}");'>
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
                                    <div class="thumbnail-post" loading="lazy" data-pagespeed-url-hash="814022818" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" style='background-image: url("{{ asset('images_upload/' .$achievment->thumbnail)}}");'>
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