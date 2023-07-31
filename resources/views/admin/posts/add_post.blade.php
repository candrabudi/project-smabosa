@extends('admin.layouts.app')
@section('title')
Tambah Post
@endsection
<style>
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
    .spinner {
    border: 4px solid rgba(0, 0, 0, 0.1);
    border-left-color: #3498db;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    animation: spin 1s linear infinite;
    }

    @keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
    }
</style>
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Posts /</span> Tambah Posting</h4>
    <div class="row mb-3">
        <form id="create-post-form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="form-label" for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" required />
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="document-editor">
                                <div class="toolbar-container"></div>
                                <div class="content-container">
                                    <div id="editor">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-select" id="status" required>
                                        <option value="Publish">Publish</option>
                                        <option value="Draft">Draft</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="post_language">Bahasa</label>
                                    <select class="form-select" id="post_language" required>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="English">English</option>
                                        <option value="Jawa">Jawa</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="flatpickr-date" class="form-label">Tanggal Post</label>
                                    <input type="text" class="form-control" placeholder="YYYY-MM-DD" id="flatpickr-datetime" />
                                </div>
                            </div>
                            <button type="button" id="submit-post" class="btn btn-primary">Simpan</button>
                            <button class="btn btn-primary d-none" type="button" id="spiner-button" disabled>
                                <span class="spinner-border me-1" role="status" aria-hidden="true"></span>
                                Loading...
                            </button>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="form-label" for="short_desc">Deskripsi Singkat</label>
                            <textarea name="" id="short_desc" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 mt-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title mb-0">
                                    <h5 class="mb-0">Kategori</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="select2-success">
                                    <select name="" id="select2Success" class="select2 form-select" multiple>
                                        @foreach($master_categories as $mc)
                                        <option value="{{ $mc->id }}">{{$mc->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title mb-0">
                                    <h5 class="mb-0">Thumbnail</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <input class="form-control" id="thumbnail" type="file" id="formFile" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('styles')
<style>
    #editor {
        min-height: 300px;
    }
</style>
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/flatpickr/flatpickr.css')}}" /> 
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/select2/select2.css') }}" />
<script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('scripts')
<script src="{{ asset('backend/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('backend/js/forms-selects.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{ asset('backend/js/forms-pickers.js')}}"></script>
<script>
    DecoupledEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {uploadUrl: '{{route('admin.posts.upload').'?_token='.csrf_token()}}',
            }
        })
        .then(editor => {
            const toolbarContainer = document.querySelector('.toolbar-container');

            toolbarContainer.prepend(editor.ui.view.toolbar.element);

            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });

    function clearEditor() {
        var editor = DecoupledEditor.instances[0];
        editor.setData('');
    }
</script>

<script>
    $(document).ready(function() {
        $('#submit-post').click(function() {
            console.log("kodok");
            $('#spiner-button').removeClass('d-none');
            $('#submit-post').addClass('d-none');
            Swal.fire({
                title: 'Yakin?',
                text: "Kamu akan menambahkan post",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                customClass: {
                    confirmButton: 'btn btn-primary me-3',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    event.preventDefault();
                    var imageFile = $('#thumbnail')[0].files[0];
                    var post_title = $('#judul').val();
                    var post_status = $('#status').val();
                    var post_categories = $('#select2Success').val();
                    var short_desc = $('#short_desc').val();
                    var post_content = $('#editor').html();
                    var post_date = $('#flatpickr-datetime').val(); 
                    var post_language = $('#post_language').val();
                    var formData = new FormData();
                    formData.append('post_thumbnail', imageFile);
                    formData.append('post_title', post_title);
                    formData.append('post_status', post_status);
                    formData.append('short_desc', short_desc);
                    formData.append('post_categories', post_categories);
                    formData.append('post_content', post_content);
                    formData.append('post_date', post_date);
                    formData.append('post_language', post_language);

                    $.ajax({
                        url: '{{ route('admin.posts.store').'?_token='.csrf_token() }}',
                        type : "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasl!',
                                text: 'Postingan Berhasil Di tambahkan!',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/bosa-admin/posts';
                                }
                            });
                        },
                        error: function(xhr, response) {
                            if(xhr.responseJSON.code == 400){
                                if(xhr.responseJSON.message == "Error upload thumbnail!"){
                                    $('#spiner-button').addClass('d-none');
                                    $('#submit-post').removeClass('d-none');
                                    Swal.fire({
                                        title: 'Error!',
                                        text: xhr.responseJSON.message,
                                        icon: 'error',
                                        customClass: {
                                        confirmButton: 'btn btn-primary'
                                        },
                                        buttonsStyling: false
                                    });
                                }
                            }else if(xhr.responseJSON.code == 500){
                                $('#spiner-button').addClass('d-none');
                                $('#submit-post').removeClass('d-none');
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Something Wrong Error!',
                                    icon: 'error',
                                    customClass: {
                                    confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                });
                            }
                        }
                    });
                } else {
                    $('#spiner-button').addClass('d-none');
                    $('#submit-post').removeClass('d-none');
                    Swal.fire({
                        icon: 'info',
                        title: 'Penambahan Dibatalkan',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    });
</script>

@endsection