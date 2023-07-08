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
                        <a href=event-details.html><img src="{{ asset('images/events/'.$event->thumbnail) }}" alt="#" data-pagespeed-url-hash=358499839 onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                        <p class=date>{{ $carbon::parse($event->date_event)->format('d') }}
                            <span>{{ $carbon::parse($event->date_event)->format('M')}}</span>
                        </p>
                    </div>
                    <div class=content>
                        <h3><a href=event-details.html>{{$event->title}}</a></h3>
                        <p><?php echo substr($event->short_desc, 0, 100) ?>...</p>
                    </div>
                    <div class=bottom-content>
                        <span class=time>
                            <i class="lni lni-timer"></i>
                            <a href="javascript:void(0)">{{ $carbon::parse($event->date_event)->format('H:i')}}</a>
                        </span>
                    </div>
                </div>

            </div>
            @endforeach
            <div class="col-lg-4 col-md-12 col-12">
                @foreach($eventLasts as $event_last)
                <div class="single-event short wow fadeInUp" data-wow-delay=.6s>
                    <div class=content>
                        <p class=date>{{ $carbon::parse($event_last->date_event)->format('d')}}<span>{{ $carbon::parse($event_last->date_event)->format('M')}}</span></p>
                        <h3><a href=event-details.html>{{ $event_last->title }}</a></h3>
                        <p><?php echo substr($event_last->short_desc, 0, 90) ?></p>
                    </div>
                    <div class=bottom-content>
                        <span class=time>
                            <i class="lni lni-timer"></i>
                            <a href="javascript:void(0)">{{ $carbon::parse($event_last->date_event)->format('H:i')}}</a>
                        </span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

<section class="latest-news-area section" style="background-color: #fff;">
    <div class=container>
        <div class=row>
            <div class=col-12>
                <div class=section-title>
                    <div class="section-icon wow zoomIn" data-wow-delay=.4s>
                        <i class="lni lni-bookmark"></i>
                    </div>
                    <h2 class="wow fadeInUp" data-wow-delay=.4s>Artikel Smabosa</h2>
                    <p class="wow fadeInUp" data-wow-delay=.6s>There are many variations of passages of Lorem
                        Ipsum available, but the majority have suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class=row>
            @foreach($articles as $article)
            <div class="col-lg-4 col-md-6 col-12 mt-5">

                <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=.2s>
                    <div class=image>
                        <a href=blog-single-sidebar.html><img class=thumb src="{{asset('images/berita/' .$article->thumbnail)}}" alt="#" data-pagespeed-url-hash=4204970080 onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></a>
                    </div>
                    <div class=content-body>
                        <div class=meta-data>
                            <ul>
                                <li>
                                    <i class="lni lni-tag"></i>
                                    <a href="javascript:void(0)">{{ $article->ArticleCategory->name }}</a>
                                </li>
                                <li>
                                    <i class="lni lni-calendar"></i>
                                    <a href="javascript:void(0)">January 25, 2023</a>
                                </li>
                            </ul>
                        </div>
                        <h4 class=title><a href=blog-single-sidebar.html>{{ $article->title }}</a></h4>
                        <p><?php echo substr($article->short_desc, 0, 100) ?>....</p>
                        <div class=button>
                            <a href="{{ route('blog.detail', $article->slug)}}" class=btn>Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>