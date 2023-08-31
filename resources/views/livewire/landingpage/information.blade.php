<div>
    <section class="information section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="information-first">
                        <img src="{{ asset('images_upload/' . $info_first->info_image) }}" alt="" loading="lazy">
                        <h3><a href="{{ route('id.extracurricular') }}">EKSTRAKURIKULER</a></h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="information-second">
                        <div class="row">
                            @foreach($info_images as $ii)
                            <div class="col-lg-12 mb-3">
                                <div class="content-information">
                                    <div class="thumbnail-information" style="background-image: url('{{ asset('images_upload/'.$ii->info_image) }}');" loading="lazy">
                                    </div>
                                    <h3><a href="{{ $ii->route }}">{{ $ii->info_name }}</a></h3>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>