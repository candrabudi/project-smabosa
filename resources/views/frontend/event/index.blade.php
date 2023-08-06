@extends('frontend.layouts.app')

@section('title')
Tentang - Smabosa
@endsection

@section('content')
@inject('carbon', 'Carbon\Carbon')
<section class="events section grid-page">
    <div class="container">
        <div class="row">
            @foreach($events as $key => $event)
            <div class="col-lg-4 col-md-6 col-12">

                <div class="single-event wow fadeInUp" data-wow-delay=".2s">
                    <div class="event-image">
                        <a href="{{route('event.detail', $event->slug)}}"><img src="{{ asset('images_upload/'.$event->thumbnail) }}" alt="#" data-pagespeed-url-hash=358499839 onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                        <p class=date>{{ $carbon::parse($event->event_date)->format('d') }}
                            <span>{{ $carbon::parse($event->event_date)->format('M')}}</span>
                        </p>
                    </div>
                    <div class="content">
                        <h3><a href={{route('event.detail', $event->slug)}}>{{$event->title}}</a></h3>
                        <p><?php echo substr($event->short_desc, 0, 100) ?>...</p>
                    </div>
                    <div class="bottom-content">
                        <span class=time>
                            <i class="lni lni-timer"></i>
                            <a href="javascript:void(0)">{{ $carbon::parse($event->event_date)->format('H:i')}}</a>
                        </span>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection