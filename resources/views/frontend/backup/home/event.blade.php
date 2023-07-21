@inject('carbon', 'Carbon\Carbon')
<section class="events section">
    <div class=container>
        <div class=row>
            <div class=col-12>
                <div class=section-title>
                    <div class="section-icon wow zoomIn" data-wow-delay=.4s>
                        <i class="lni lni-bookmark"></i>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=.4s>Agenda</h2>
                    <p class="wow fadeInUp" data-wow-delay=.6s>There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class=row>
            @foreach($events as $key => $event)
            <div class="col-lg-4 col-md-6 col-12">

                <div class="single-event wow fadeInUp" data-wow-delay=.2s>
                    <div class=event-image>
                        <a href=event-details.html>
                            <div class="thumbnail-event" style='background-image: url("{{ asset('images/'.$event->thumbnail) }}");'>
                                <div class="thumbnail-content">
                                    <p>
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, perspiciatis.
                                    </p>
                                </div>
                            </div>
                        </a>
                        <p class=date>{{ $carbon::parse($event->event_date)->format('d') }}
                            <span>{{ $carbon::parse($event->event_date)->format('M')}}</span>
                        </p>
                    </div>
                    <div class=content>
                        <h3><a href=event-details.html>{{$event->title}}</a></h3>
                        <p><?php echo substr($event->short_desc, 0, 100) ?>...</p>
                    </div>
                    <div class=bottom-content>
                        <span class=time>
                            <i class="lni lni-timer"></i>
                            <a href="javascript:void(0)">{{ $carbon::parse($event->event_date)->format('H:i')}}</a>
                        </span>
                    </div>
                </div>

            </div>
            @endforeach
            <div class="col-lg-4 col-md-12 col-12">
                @foreach($eventLasts as $event_last)
                <div class="single-event short wow fadeInUp" data-wow-delay=.6s>
                    <div class=content>
                        <p class=date>{{ $carbon::parse($event_last->event_date)->format('d')}}<span>{{ $carbon::parse($event_last->event_date)->format('M')}}</span></p>
                        <h3><a href=event-details.html><?php echo substr($event_last->title, 0, 30) ?>...</a></h3>
                        <p><?php echo substr($event_last->short_desc, 0, 90) ?></p>
                    </div>
                    <div class=bottom-content>
                        <span class=time>
                            <i class="lni lni-timer"></i>
                            <a href="javascript:void(0)">{{ $carbon::parse($event_last->event_date)->format('H:i')}}</a>
                        </span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>