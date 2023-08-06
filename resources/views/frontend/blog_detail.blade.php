@extends('frontend.layouts.app')

@section('title')
{{$article->post_title}} - Smabosa
@endsection

@section('content')

@include('frontend.article.blog_detail_content')

@endsection