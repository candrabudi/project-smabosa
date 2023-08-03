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
                        <h5 class="align-self-center m-0">List Tentang Sekolah</h5>
                        <button class="btn btn-success btn-sm ms-auto btn-toggle-sidebar" data-bs-toggle="offcanvas" data-bs-target="#modalAboutSchool" aria-controls="modalAboutSchool">
                            <i class="ti ti-plus me-1"></i>
                            <span class="align-middle">&NonBreakingSpace;Tambah Tentang Sekolah</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive">
                            <table class="dt-responsive table" id="get-about-school">
                                <thead>
                                    <tr>
                                        <th width=50>No</th>
                                        <th>Judul</th>
                                        <th>Bahasa</th>
                                        <th>Deskripsi Singkat</th>
                                        <th width=180>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.about.createOrUpdate')
@endsection
@section('styles')
<style>
    #editor {
        min-height: 300px;
    }

    .document-editor {
        padding: 10px;
        border: 1px solid #DFE4E6;
        border-bottom-color: #cdd0d2;
        border-right-color: #cdd0d2;
        border-radius: 2px;
        max-height: 700px;
        display: flex;
        flex-flow: column nowrap;
        background-color: #FFF;
    }

    .toolbar-container {
        z-index: 1;
        position: relative;
        box-shadow: 2px 2px 1px rgba(0, 0, 0, .05);
    }

    .toolbar-container .ck.ck-toolbar {
        border-top-width: 0;
        border-left-width: 0;
        border-right-width: 0;
        border-radius: 0;
    }

    .content-container {
        padding: var(--ck-sample-base-spacing);
        background: #eee;
        overflow-y: scroll;
        padding: 20px;
        box-sizing: border-box;
    }

    .content-container #editor {
        border-top-left-radius: 0;
        border-top-right-radius: 0;

        width: 20.8cm;
        min-height: 550px;
        padding: 1cm 1cm 2cm;
        margin: 0 auto;
        box-shadow: 2px 2px 1px rgba(0, 0, 0, .05);
    }

    .ck-content {
        background-color: #FFF;
    }

    .image-input {
        box-sizing: border-box;
        display: inline-block;
        width: 200px;
        height: 200px;
        background: whitesmoke;
        border-radius: 4px;
        position: relative;
        cursor: pointer;
        box-shadow: 0 1px 10px 0 rgba(0, 0, 0, 0.15);
        margin: 0 12px 12px 0;
    }

    .image-input:before {
        content: "";
        background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 419.2 419.2"><circle cx="158" cy="144.4" r="28.8"/><path d="M394.4 250.4c-13.6-12.8-30.8-21.2-49.6-23.6V80.4c0-15.6-6.4-29.6-16.4-40C318 30 304 24 288.4 24h-232c-15.6 0-29.6 6.4-40 16.4C6 50.8 0 64.8 0 80.4v238.8c0 15.6 6.4 29.6 16.4 40 10.4 10.4 24.4 16.4 40 16.4h224.4c14.8 12 33.2 19.6 53.6 19.6 23.6 0 44.8-9.6 60-24.8 15.2-15.2 24.8-36.4 24.8-60s-9.6-44.8-24.8-60zM21.2 80.4c0-9.6 4-18.4 10.4-24.4 6.4-6.4 15.2-10.4 24.8-10.4h232c9.6 0 18.4 4 24.8 10.4 6.4 6.4 10.4 15.2 10.4 24.8v124.8l-59.2-59.2c-4-4-10.8-4.4-15.2 0L160 236l-60.4-60.8c-4-4-10.8-4.4-15.2 0l-63.2 64V80.4zM56 355.2v-.8c-9.6 0-18.4-4-24.8-10.4-6-6.4-10-15.2-10-24.8v-49.6L92 198.4l60.4 60.4c4 4 10.8 4 15.2 0l89.2-89.6 58.4 58.8-3.6 1.2c-1.6.4-3.2.8-5.2 1.6-1.6.4-3.2 1.2-4.8 1.6-1.2.4-2 .8-3.2 1.6-1.6.8-2.8 1.2-4 2l-6 3.6c-1.2.8-2 1.2-3.2 2-.8.4-1.2.8-2 1.2-3.6 2.4-6.8 5.2-9.6 8.4-15.2 15.2-24.8 36.4-24.8 60 0 6 .8 11.6 2 17.6.4 1.6.8 2.8 1.2 4.4 1.2 4 2.4 8 4 12v.4c1.6 3.2 3.2 6.8 5.2 9.6H56zm322.8 0c-11.6 11.6-27.2 18.4-44.8 18.4-16.8 0-32.4-6.8-43.6-17.6-1.6-1.6-3.2-3.6-4.8-5.2-1.2-1.2-2.4-2.8-3.6-4-1.6-2-2.8-4.4-4-6.8-.8-1.6-1.6-2.8-2.4-4.4-.8-2-1.6-4.4-2-6.8-.4-1.6-1.2-3.6-1.6-5.2-.8-4-1.2-8.4-1.2-12.8 0-17.6 7.2-33.2 18.4-44.8 11.2-11.6 27.2-18.4 44.8-18.4s33.2 7.2 44.8 18.4c11.6 11.6 18.4 27.2 18.4 44.8 0 17.2-7.2 32.8-18.4 44.4z"/><path d="M341.6 267.6c-.8-.8-2-1.6-3.6-2.4-1.2-.4-2.4-.8-3.6-.8h-.8c-1.2 0-2.4.4-3.6.8-1.2.4-2.4 1.2-3.6 2.4l-24.8 24.8c-4 4-4 10.8 0 15.2 4 4 10.8 4 15.2 0l6.4-6.4v44c0 6 4.8 10.8 10.8 10.8s10.8-4.8 10.8-10.8v-44l6.4 6.4c4 4 10.8 4 15.2 0 4-4 4-10.8 0-15.2l-24.8-24.8z"/></svg>');
        display: inline-block;
        position: absolute;
        width: 40px;
        height: 40px;
        left: 52%;
        top: 52%;
        opacity: 0.3;
        transition: opacity 200ms;
        transform: translate(-50%, -50%);
    }

    .image-input.isUploading::after {
        content: "";
        display: inline-block;
        position: absolute;
        width: 30px;
        height: 30px;
        left: 32px;
        top: 32px;
        opacity: 0.3;
        border-radius: 50%;
        border: 2px solid;
        border-color: transparent currentColor currentColor currentColor;
        -webkit-animation: spin 600ms linear infinite;
        animation: spin 600ms linear infinite;
    }

    .image-input.isUploading::before {
        display: none;
    }

    .image-input input[type=file] {
        opacity: 0;
        display: block;
        height: 100px;
        pointer-events: none;
    }

    .image-input img {
        position: absolute;
        display: block;
        border-radius: 4px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        transition: opacity 200ms;
        opacity: 1;
        -o-object-fit: cover;
        object-fit: cover;
        -o-object-position: center;
        object-position: center;
        background: white;
        z-index: 1;
    }

    .image-input img[src=""] {
        opacity: 0;
        pointer-events: none;
    }

    .image-input .image-remove {
        position: absolute;
        top: -8px;
        right: -8px;
        z-index: 1;
        border: none;
        background: white;
        width: 20px;
        height: 20px;
        border-radius: 12px;
        cursor: pointer;
    }

    .image-input .image-remove::before,
    .image-input .image-remove::after {
        content: "";
        display: block;
        height: 2px;
        width: 12px;
        background: #333;
        border-radius: 2px;
        position: absolute;
        top: 10px;
        left: 4px;
    }

    .image-input .image-remove::before {
        transform: rotate(45deg);
    }

    .image-input .image-remove::after {
        transform: rotate(-45deg);
    }
</style>
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/flatpickr/flatpickr.css')}}" /> 
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/select2/select2.css') }}" />
<script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('scripts')
<script>
    function ImageInput(element) {
        // Variables
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

        // Methods
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
@include('admin.about.store')
@include('admin.about.update')
@include('admin.about.delete')
@include('admin.about.datatable')
@endsection