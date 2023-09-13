@extends('admin.layouts.app')
@section('title')
Tentang Sekolah
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Tentang Sekolah /</span> Semua Data</h4>
    <p class="mb-4">Buat, edit, dan kelola Kategori di situs Anda.</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="nav-align-top mb-4">
                    <div class="card-header p-3 d-flex mb-4">
                        <h5 class="align-self-center m-0">Edit Tentang Sekolah</h5>
                    </div>
                    <div class="card-body">
                        <div class="offcanvas-body pt-0" id="card-block">
                            <form class="event-form pt-0" id="categoryForm" onsubmit="return false">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label class="form-label" for="titleAbout">Tentang Sekolah</label>
                                            <input type="text" class="form-control" id="titleAbout" value="{{$about_school->title}}" name="titleAbout" placeholder="Tentang Sekolah" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="titleAbout">Tentang Sekolah</label>
                                            <div class="document-editor">
                                                <div class="toolbar-container"></div>
                                                <div class="content-container">
                                                    <div id="editor" class="content-about-school">
                                                        <?php echo $about_school->content ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="languageAbout">Bahasa</label>
                                            <select class="select2 select-event-label form-select" id="languageAbout" name="languageAbout">
                                                <option data-label="primary" value="Indonesia" {{$about_school->language == "Indonesia" ? 'selected' : ''}}>Indonesia</option>
                                                <option data-label="primary" value="English" {{$about_school->language == "English" ? 'selected' : ''}}>English</option>
                                                <option data-label="primary" value="Jawa" {{$about_school->language == "Jawa" ? 'selected' : ''}}>Jawa</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="shortDescAbout">Deskripsi Singkat</label>
                                            <textarea name="shortDescAbout" id="shortDescAbout" class="form-control" cols="30" rows="10">{{$about_school->short_desc}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="image-input border">
                                                <input type="file" name="file" id="imageAbout" accept="image/png,image/jpeg" max-size="10000000">
                                                <input type="hidden" name="">
                                                <img src="" alt="">
                                            </label>
                                        </div>
                                        <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                                            <div>
                                                <button type="submit" id="submit-about" class="btn btn-warning btn-card-block-overlay-2">
                                                    Edit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('asset_be/vendor/libs/flatpickr/flatpickr.css')}}" /> 
<link rel="stylesheet" href="{{ asset('asset_be/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('asset_be/css/style.css') }}" />
<script src="{{ asset('asset_be/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('scripts')
<script>
    function ImageInput(element) {
        var $wrapper = element;
        var $file = $wrapper.querySelector('input[type=file]');
        var $input = $wrapper.querySelector('input[type=hidden]');
        var $img = $wrapper.querySelector('img');
        var maxSize = Number($file.getAttribute('max-size'));
        var types = $file.accept.split(',');

        var api = {
            onInvalid: onInvalid,
            onChanged: onChanged,
        };

        function fileHandler(e) {
            var file = $file.files.length && $file.files[0];

            if (!file) return;

            var errors = checkValidity(file);

            if (errors) {
                api.onInvalid(errors);
                $file.value = null;
                return;
            }

            api.onChanged(file, update, $wrapper)
        }

        function humanizeFormat(string) {
            return string.replace(/.*?\//, '');
        }

        function checkValidity(file) {
            var errors = [];

            types.includes(file.type) || errors.push('Format file harus: ' + types.map(humanizeFormat).join(', '));
            file.size < maxSize || errors.push('Ukuran file maksimal ' + maxSize / 1000000 + 'MB');

            return errors.length ? errors : false;
        }

        function getFileData(file, callback) {
            var reader = new FileReader();

            reader.addEventListener("load", function() {
                callback(reader.result);
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function update(data) {
            $img.src = data;
            $input.value = data;
        }

        function onInvalid(errors) {
            alert(errors.join('. '));
        }

        function onChanged(file, update, $wrapper) {
            console.log('.onChanged called');
            getFileData(file, update);
        }

        // Init
        $file.addEventListener('change', fileHandler);

        return api;
    };

    document.querySelectorAll('.image-input').forEach(_ => {
        var imageInput = new ImageInput(_);
        _.addEventListener("click", (e) => {
            if (e.target.classList.contains('image-remove')) {
                _.remove()
            }
        });



        if (_.classList.contains('withAjax')) {
            imageInput.onChanged = customOnChanged;

        }

        function customOnChanged(file, update, $el) {
            if (!$el.nextElementSibling) {
                var $remove = document.createElement('button');
                $remove.className = "image-remove";

                var $new = $el.cloneNode(true);
                $new.querySelector('input[type=hidden]').value = "";
                $new.querySelector('input[type=file]').value = "";
                $new.querySelector('img').src = "";

                $el.parentElement.append($new);
                $el.append($remove);

                var imageInput = new ImageInput($new);
                imageInput.onChanged = customOnChanged;
            }

            $el.classList.add('isUploading');
            setTimeout(function() {
                update('https://placekitten.com/200/300');
                $el.classList.remove("isUploading");
            }, 3000);

        };

    });
</script>
@include('admin.about.editorJs')
@endsection