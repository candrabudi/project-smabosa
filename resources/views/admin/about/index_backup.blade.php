@extends('admin.layouts.app')
@section('title')
Tambah Post
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Tentang Sekolah /</span> Semua Tentang Sekolah</h4>
    <div class="row mb-3">
        <form id="create-post-form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="form-label" for="title">Judul</label>
                            <input type="text" class="form-control" id="title" value="{{$about_school->title ?? ''}}" required />
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="document-editor">
                                <div class="toolbar-container"></div>
                                <div class="content-container" style="pading: 20px;border: 2px solid #DEDEDE">
                                    <div id="editor"><?php echo $about_school->content ?? '' ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="form-label" for="shor_desc">Deskripsi Singkat</label>
                            <textarea name="" id="short_desc" cols="30" rows="5" class="form-control">{{$about_school->short_desc ?? ''}}</textarea>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <input type="file" id="thumbnail" required>
                            <button type="button" class="btn btn-success mt-3" id="submit-about">Simpan</button>
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
        $('#submit-about').click(function() {
            Swal.fire({
                title: 'Yakin?',
                text: "Kamu akan mengubah data",
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
                    var title = $('#title').val();
                    var content = $('#editor').html();
                    var short_desc = $('#short_desc').val();
                    var formData = new FormData();
                    formData.append('about_thumbnail', imageFile);
                    formData.append('title', title);
                    formData.append('short_desc', short_desc);
                    formData.append('content', content);

                    $.ajax({
                        url: '{{ route('admin.about-school.store').'?_token='.csrf_token() }}',
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasl!',
                                text: 'Berhasil Di Ubah!',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/bosa-admin/about-school';
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