@extends('frontend.layouts.app')

@section('title')
Home - Smabosa
@endsection

@section('content')
@include('frontend.home.hero')
@include('frontend.home.collaboration')
@include('frontend.home.information')
@include('frontend.home.achivement')
@endsection