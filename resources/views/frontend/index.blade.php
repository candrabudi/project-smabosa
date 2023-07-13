@extends('frontend.layouts.app')

@section('title')
Home - Smabosa
@endsection

@section('content')
@include('frontend.home.hero_slider')
@include('frontend.home.program_study')
@include('frontend.home.about')
@include('frontend.home.articles')
@include('frontend.home.pcpdb')
@include('frontend.home.bosa_achievment')
@endsection