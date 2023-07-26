@extends('frontend.layouts.app')

@section('title')
Blog - Smabosa
@endsection

@section('content')

<section class="section latest-news-area blog-grid-page">
    <div class=container>
        <div class=row>
            @include('frontend.announcement.grid')
            @include('frontend.announcement.sidebar')
        </div>
    </div>
</section>

@endsection