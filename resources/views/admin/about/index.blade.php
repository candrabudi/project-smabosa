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
                        <button type="reset" class="btn btn-success btn-sm ms-auto btn-toggle-sidebar" data-bs-toggle="offcanvas" data-bs-target="#modalAboutSchool" aria-controls="modalAboutSchool">
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
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/flatpickr/flatpickr.css')}}" /> 
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}" />
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