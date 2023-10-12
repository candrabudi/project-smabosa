@section('title', $article->post_title)
@section('meta_description')
    <meta name="description"
    content="{{$article->post_shor_desc}}">
    <meta name="keywords" content="smabosa, sma 1 bopkri yogyakarta, sma bopkri 1 yogyakarta, {{$article->post_title}}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset_be/img/logo/logo-bosa.webp') }}" />

    <meta name="publisher" content="SMA BOPKRI 1 YOGYAKARTA">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <link rel="canonical" href="https://smabosa-yogyakarta/id/blog/{{$article->post_slug}}">

    <meta property="og:title" content="{{$article->post_title}} - SMA BOPKRI 1 YOGYAKARTA">
    <meta property="og:description" content="{{$article->post_shor_desc}}">
    <meta property="og:url" content="https://smabosa-yogyakarta/id/blog/{{$article->post_slug}}">
    <meta property="og:site_name" content="SMA BOPKRI 1 YOGYAKARTA">
    <meta property="og:locale" content="id_ID">
    <meta property="og:image" content="{{ asset('asset_be/img/logo/logo-bosa.webp') }}">
    <meta property="og:image:width" content="1251">
    <meta property="og:image:height" content="576">
    <meta property="og:image:type" content="image/png">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="SMA BOPKRI 1 YOGYAKARTA">
    <meta name="twitter:creator" content="@diengetawalin10k">
    <meta name="twitter:title" content="{{$article->post_title}} - SMA BOPKRI 1 YOGYAKARTA">
    <meta name="twitter:description" content="{{$article->post_shor_desc}}">
@endsection
<div>
<livewire:layout.header/>
    <section class="section blog-single">
        <div class=container>
            <div class=row>
                <div class="col-lg-8 col-12">
                    <div class=single-inner>
                        <div class=post-thumbnils>
                            <img src="{{ asset('images_upload/'.$article->post_thumbnail) }}" alt="#" data-pagespeed-url-hash=1974793277 onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        </div>
                        <div class=post-details>
                            <div class=detail-inner>
    
                                <ul class="custom-flex post-meta">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-calendar"></i>
                                            
                                        </a>
                                    </li>
                                </ul>
                                <h2 class=post-title>
                                    <a href="javascript:void(0)">{{$article->post_title}}</a>
                                </h2>
    
                                <div class="content-blog mt-3" style="list-style-type: circle;">
                                    <?php echo $article->post_content ?>
                                    
                                    @if($article->post_title == "PEDOMAN DAN PENGISIAN FORMULIR PCPDB SMA BOSA TAHUN PELAJARAN 2024-2025")
                                        <a href="https://formulir.smabosa-yogya.sch.id" class="btn btn-primary" style="width: 100%;">ISI FORMULIR ONLINE</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <livewire:blog.sidebar />
            </div>
        </div>
    </section>
    <livewire:layout.footer/>
</div>