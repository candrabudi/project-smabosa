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
                            <h2 class="wow fadeInUp" data-wow-delay=.4s>KEGIATAN BOSA</h2>
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
                                    <div class="thumbnail-post" style='background-image: url("{{asset('images/' .$activity->post_thumbnail)}}");'>
                                        <div class="thumbnail-content">
                                            <p>
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, perspiciatis.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class=content-body>
                                <h4 class=title><a href="#">{{ $activity->post_title }}</a></h4>
                            </div>
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
                            <h2 class="wow fadeInUp" data-wow-delay=.4s>BERPRESTASI BERSAMA BOSA</h2>
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
                                    <div class="thumbnail-post" style='background-image: url("{{asset('images/' .$achievment->thumbnail)}}");'>
                                        <div class="thumbnail-content">
                                            <p>
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, perspiciatis.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class=content-body>
                                <h4 class=title><a href="#">{{ $achievment->title }}</a></h4>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>