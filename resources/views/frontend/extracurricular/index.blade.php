@extends('frontend.layouts.app')

@section('title')
Ekstrakurikuler - Smabosa
@endsection

@section('content')
<section id="teachers" class="teachers section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title align-center gray-bg">
                    <span>Ekstrakurikuler</span>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Ekstrakurikuler SMK 1 BOPKRI Yogyakarta</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, dolorum!</p>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($extracurriculars as $extracurricular)
            <div class="col-lg-6 col-md-6 col-12">
                <div class="single-team wow fadeInUp" data-wow-delay=".2s">
                    <div class="row">
                        <div class="col-lg-5 col-12">

                            <div class="image">
                                <img src="{{ asset('images/'.$extracurricular->thumbnail) }}" alt="#" data-pagespeed-url-hash="814022818" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                            </div>

                        </div>
                        <div class="col-lg-7 col-12">
                            <div class="info-head">

                                <div class="info-box">
                                    <span class="designation">{{ $extracurricular->title }}</span>
                                    <h4 class="name"><a href="{{route('extracurricular.detail', $extracurricular->slug)}}">{{ $extracurricular->title }}</a></h4>
                                    <p>{{ $extracurricular->short_desc }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{ $extracurriculars->links('frontend.layouts.paginate') }}
        </div>
    </div>
</section>
@endsection