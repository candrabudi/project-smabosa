@extends('admin.layouts.app')
@section('title')
Tambah Post
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1 mt-0"><span class="text-muted fw-light">Posts /</span> Edit Posting</h4>
    <div class="row mb-3">
        <form id="create-post-form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="form-label" for="judul">Judul</label>
                            <input type="text" class="form-control" value="{{$post->post_title}}" id="judul" required />
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="document-editor">
                                <div class="toolbar-container"></div>
                                <div class="content-container" style="pading: 20px;border: 2px solid #DEDEDE">
                                    <div id="editor"><?php echo $post->post_content ?></div>
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
                                    <option value="Publish" {{($post->post_status == 'Publish') ? 'selected' : ''}}>Publish</option>
                                    <option value="Draft" {{($post->post_status == 'Draft') ? 'selected' : ''}}>Draft</option>
                                </select>

                                <label for="flatpickr-date" class="form-label mt-3">Tanggal Post</label>
                                <input type="text" class="form-control" placeholder="YYYY-MM-DD" value="{{$post->post_date}}" id="flatpickr-datetime" />

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
                                        @foreach($data_categories as $dc)
                                            <option value="{{ $dc['id'] }}" {{$dc['selected'] == true ? 'selected' : ''}}>{{$dc['name']}}</option>
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
        min-height: 350px;
    }
</style>
<link rel="stylesheet" href="{{ asset('asset_be/vendor/libs/flatpickr/flatpickr.css')}}" /> 
<link rel="stylesheet" href="{{ asset('asset_be/vendor/libs/select2/select2.css') }}" />
<script src="{{ asset('asset_be/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('scripts')
<script src="{{ asset('asset_be/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('asset_be/js/forms-selects.js') }}"></script>
<script src="{{ asset('asset_be/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{ asset('asset_be/js/forms-pickers.js')}}"></script>
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

</script>

<script>
    $(document).ready(function() {
        $('#submit-post').click(function() {
            Swal.fire({
                title: 'Yakin?',
                text: "Kamu akan Mengedit post",
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
                    var post_content = $('#editor').html();
                    var post_date = $('#flatpickr-datetime').val();
                    var formData = new FormData();
                    formData.append('post_thumbnail', imageFile);
                    formData.append('post_title', post_title);
                    formData.append('post_status', post_status);
                    formData.append('post_categories', post_categories);
                    formData.append('post_content', post_content);
                    formData.append('post_date', post_date);

                    $.ajax({
                        url: '{{ route('admin.posts.update', $post->id).'?_token='.csrf_token() }}',
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasl!',
                                text: 'Postingan Berhasil Di Edit!',
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
                        title: 'Perubahan Dibatalkan',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    });
    
</script>

@endsection