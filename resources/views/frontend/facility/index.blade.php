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
                    <span>Guru</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Data Fasilitas SMA 1 BOPKRI Yogyakarta</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolorum!</p>
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
                                <img src="{{ asset('images/'.$facility->thumbnail) }}" alt="#" data-pagespeed-url-hash="814022818" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                            </div>

                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="info-head">

                                <div class="info-box">
                                    <h4 class="name"><a href="{{route('facility.detail', $facility->slug)}}">{{ $facility->title }}</a></h4>
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