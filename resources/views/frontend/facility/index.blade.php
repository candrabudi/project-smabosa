@extends('frontend.layouts.app')

@section('title')
Fasilitas - Smabosa
@endsection

@section('content')
<section id="teachers" class="teachers section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title align-center gray-bg">
                    <span>Fasilitas</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Data Fasilitas SMA BOPKRI 1 Yogyakarta</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Fasilitas sekolah merupakan berbagai macam sarana dan prasarana yang diberikan oleh sekolah yang dapat dimanfaatkan secara baik oleh peserta didik untuk mengembangkan minat dan bakatnya, selain itu juga fasilitas sekolah juga merupakan sesuatu hal yang dapat digunakan sebagai sarana untuk mengembangkan prestasi peserta didik.
                        SMA BOSA Yogyakarta mempunyai berbagai macam fasilitas sekolah dengan rincian sebagai berikut.</p>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($facilities as $facility)
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-team wow fadeInUp" data-wow-delay=".2s">
                    <div class="row">
                        <div class="col-lg-5 col-12">

                            <div class="image image-facility">
                                <img src="{{ asset('images_upload/'.$facility->thumbnail) }}" alt="#" data-pagespeed-url-hash="814022818" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                            </div>

                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="info-head">

                                <div class="info-box">
                                    <h4 class="name"><a href="{{route('id.facility.detail', $facility->slug)}}">{{ $facility->title }}</a></h4>
                                    <p><?php echo $facility->short_desc ?></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $facilities->links('frontend.layouts.paginate') }}
        </div>
    </div>
</section>
@endsection