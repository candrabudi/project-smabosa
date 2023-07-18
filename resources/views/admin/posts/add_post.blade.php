@extends('admin.layouts.app')
@section('title')
Tambah Post
@endsection
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
                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="form-label" for="short_desc">Deskripsi Singkat</label>
                            <textarea name="" id="short_desc" cols="30" rows="5" class="form-control" ></textarea>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="document-editor">
                                <div class="toolbar-container"></div>
                                <div class="content-container" style="pading: 20px;border: 2px solid #DEDEDE">
                                    <div id="editor"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                
                                <label class="form-label" for="status">Status</label>
                                <select class="form-select" id="status" required>
                                    <option value="Publish">Publish</option>
                                    <option value="Draft">Draft</option>
                                </select>

                                <label for="flatpickr-date" class="form-label">Tanggal Post</label>
                                <input type="text" class="form-control" placeholder="YYYY-MM-DD" id="flatpickr-datetime" />

                            </div>
                            <button type="button" id="submit-post" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6 mt-4">
                        <div class="card h-100">
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
    #editor{
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
            ckfinder: {
                uploadUrl: '{{route('admin.posts.upload').'?_token='.csrf_token()}}',
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
                    var formData = new FormData();
                    formData.append('post_thumbnail', imageFile);
                    formData.append('post_title', post_title);
                    formData.append('post_status', post_status);
                    formData.append('short_desc', short_desc);
                    formData.append('post_categories', post_categories);
                    formData.append('post_content', post_content);
                    formData.append('post_date', post_date);

                    $.ajax({
                        url: '{{ route('admin.posts.store').'?_token='.csrf_token() }}',
                        type: "POST",
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
                        error: function(xhr) {
                            console.log(error)
                        }
                    });
                } else {
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