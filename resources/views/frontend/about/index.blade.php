@extends('frontend.layouts.app')

@section('title')
Tentang - Smabosa
@endsection

@section('content')

<section class="about-us section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="about-left">
                    <div class="about-title align-left">
                        <span class="wow fadeInDown" data-wow-delay=".2s">Tentang Smabosa</span>
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">{{$about->title}}</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo $about->content ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about-right wow fadeInRight" data-wow-delay=".4s">
                    <img src="{{ !empty($about) ? asset('images/'.$about->thumbnail) : 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg' }}" alt="#">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection