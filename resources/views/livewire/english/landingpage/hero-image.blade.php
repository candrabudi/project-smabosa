<div class="hero-slider">
    @foreach($image_sliders as $slider)
    <div class="hero-container">
        <div class="hero-inner">
            <img src="{{ asset('images_upload/'.$slider->image) }}" class="img-fluid" alt="{{$slider->title}}" loading="lazy">
        </div>
    </div>
    @endforeach
</div>