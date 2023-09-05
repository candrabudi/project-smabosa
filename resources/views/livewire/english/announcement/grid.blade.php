<div class="col-lg-8 col-md-7 col-12">
    <div class=row>

        @foreach($announcements as $announcement)
        <div class="col-lg-6 col-12">

            <div class="single-news custom-shadow-hover wow fadeInUp" data-wow-delay=.2s>
                <div class=image>

                    <a href="{{ route('en.announcement.detail', $announcement->slug) }}">
                        <div class="thumbnail-post" style='background-image: url("{{ url('images/'.$announcement->thumbnail) }}");'>
                            <div class="thumbnail-content">
                                <p>
                                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Modi, perspiciatis.
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class=content-body>
                    <div class=meta-data>
                        <ul>
                            <li>
                                <i class="lni lni-calendar"></i>
                                <a href="javascript:void(0)">{{ \Carbon\Carbon::now()->parse($announcement->created_at)->isoFormat("dddd, D MMM Y") }}</a>
                            </li>
                        </ul>
                    </div>
                    <h4 class=title><a href="{{ route('en.announcement.detail', $announcement->slug) }}">{{ $announcement->title }}</a></h4>
                    <p><?php echo substr($announcement->short_desc, 0, 150) ?>...</p>
                    <div class=button>
                        <a href="{{ route('en.announcement.detail', $announcement->slug) }}" class=btn> Baca Lebih Lanjut</a>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
        {{ $announcements->links('frontend.layouts.paginate') }}
    </div>
</div>