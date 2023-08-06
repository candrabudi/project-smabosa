@extends('frontend.layouts.app')

@section('title')
{{$extracurricular->title}} - Smabosa
@endsection
@section('style')
<style>
    .content-blog ul{
        list-style-type: circle;
        margin-left: 20px;
        display: block;
    }
    .ck-widget_with-resizer{
        display: inline-block;
        min-width: 10%;
        max-width: 100%;
    }
    .ck-widget_with-resizer img{
        min-width: 10%;
        max-width: 100%;
        margin-right: 20px;
    }
</style>
@endsection
@section('content')
<section class="section blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-thumbnils">
                        <img src="{{ asset('images/'.$extracurricular->thumbnail) }}" alt="#" data-pagespeed-url-hash="1974793277" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                    </div>
                    <div class="post-details">
                        <div class="detail-inner">
                            <?php echo $extracurricular->content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection