<div class="hero-slider">
    @foreach($image_sliders as $slider)
    <div class="hero-container">
        <div class="hero-inner">
            <img src="{{ asset('images_upload/'.$slider->image) }}" class="img-fluid" alt="{{$slider->title}}" x-ref="lazyImage">
        </div>
    </div>
    @endforeach
</div>