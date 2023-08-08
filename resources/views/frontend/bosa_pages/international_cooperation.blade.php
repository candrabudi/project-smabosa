@extends('frontend.layouts.app')

@section('title')
{{$international_coperation->page_name}} - Smabosa
@endsection
@section('style')
<style>
    .post-details p{
        color: #000;
    }
    .post-details ol li{
        color: #000;
    }
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
<section class="section blog-single" style="margin-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-details">
                        <div class="detail-inner">
                            <?php echo $international_coperation->page_content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection