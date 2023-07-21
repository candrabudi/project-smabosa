<style>
    .information-first {
        width: 100%;
        min-height: 800px;
    }

    .information-second {
        width: 100%;
        min-height: 500px;
    }

    .information-first h3 {
        text-align: center;
        background-color: #375bcd;
        color: #fff000;
        border-radius: 8px;
        padding: 10px;
        margin-top: 10px;
    }

    .information-first a:hover {
        color: #fff;
    }

    .information-second a:hover {
        color: #fff;
    }

    .information-first img {
        width: 100%;
    }

    .content-information {
        width: 100%;
        min-height: 250px;
    }

    .content-information .thumbnail-information {
        width: 100%;
        height: 200px;
        background-size: cover;
    }

    .content-information h3 {
        text-align: center;
        background-color: #375bcd;
        color: #fff000;
        border-radius: 8px;
        padding: 10px;
        margin-top: 10px;
        font-size: 24px;
    }

    @media only screen and (min-width: 330px) and (max-width: 470px) {
        .information-first {
            width: 100%;
            min-height: 200px!important;
            margin-bottom: 20px!important;
        }
        .content-information h3 {
            font-size: 18px!important;
        }
    }
</style>
<section class="information section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="information-first">
                    <img src="{{asset('frontend/images/image-01.jpeg')}}" alt="">
                    <h3>
                        <a href="#">EKSTRAKURIKULER</a>
                    </h3>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="information-second">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <div class="content-information">
                                <div class="thumbnail-information" style="background-image: url('{{asset('frontend/images/image-02.jpeg')}}');">

                                </div>
                                <h3>
                                    <a href="#">GURU & KARYAWAN</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="content-information">
                                <div class="thumbnail-information" style="background-image: url('{{asset('frontend/images/image-02.jpeg')}}');">

                                </div>
                                <h3>
                                    <a href="#">KERJASAMA INTERNASIONAL</a>
                                </h3>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="content-information">
                                <div class="thumbnail-information" style="background-image: url('{{asset('frontend/images/image-02.jpeg')}}');">

                                </div>
                                <h3>
                                    <a href="#">FASILITAS</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>