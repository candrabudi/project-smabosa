@extends('frontend.layouts.app')

@section('title')
{{$school_program->title}} - Smabosa
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
    .ck-reset_all {
        display: none;
    }
    .ck .ck-reset_all .ck-widget__type-around {
        display: none;
    }
    .ck-widget__selection-handle {
        display: none;
    }
    .detail-inner {
        color: #222;
    }
    .detail-inner table{
        width: 100%;
        border: 1px solid #333;
    }
    .detail-inner table td{
        border: 1px solid #333;
        padding: 5px;
        box-sizing: border-box;
    }
    .detail-inner table th{
        height: 10px!important;
        border: 1px solid #333;
        padding: 5px;
        box-sizing: border-box;
    }
</style>
@endsection
@section('content')
<section class="section blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-details">
                        <div class="detail-inner">
                            <?php echo $school_program->content ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
        // Remove the class "ck-editor__editable" from the element
        $(".ck-editor__editable").removeClass("ck-editor__editable");
        $(".ck-editor__nested-editable").removeClass("ck-editor__nested-editable");
        $("td").removeAttr("contenteditable");
        $("td").removeAttr("class");
        $("td").removeAttr("role");
        $("th").removeAttr("contenteditable");
        $("th").removeAttr("class");
        $("th").removeAttr("role");
        $("figure").removeClass("table ck-widget ck-widget_with-selection-handle");
    });
</script>
@endsection