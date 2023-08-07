@extends('admin.layouts.app')
@section('title')
Edit Fasilitas
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Ekstrakurikular Sekolah /</span> Edit Ekstrakurikular</h4>
    <div class="row mb-3">
        <div class="offcanvas-body pt-0" id="card-block">
            <form id="create-post-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <label class="form-label" for="title">Judul</label>
                                <input type="text" class="form-control" id="title" value="{{$extracurricular->title}}" required />
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <label class="form-label" for="judul">Deskripsi Singkat</label>
                                <textarea name="" id="short_desc" cols="30" rows="5" class="form-control" >{{$extracurricular->short_desc}}</textarea>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="document-editor">
                                    <div class="toolbar-container"></div>
                                    <div class="content-container" style="pading: 20px;border: 2px solid #DEDEDE">
                                        <div id="editor"><?php echo $extracurricular->content ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-country">Status</label>
                                    <select class="form-select" id="bs-validation-country" required>
                                        <option value="">Pilih Status</option>
                                        <option value="Publish" {{($extracurricular->status == 'Publish') ? 'selected' : ''}}>Publish</option>
                                        <option value="Draft" {{($extracurricular->status == 'Draft') ? 'selected' : ''}}>Draft</option>
                                    </select>
                                </div>
                                <button type="button" id="submit-post" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 mt-4">
                            <div class="card h-100">
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
        $('#submit-post').click(function() {
            Swal.fire({
                title: 'Yakin?',
                text: "Kamu akan mengubah Ekstrakurikular",
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
                    var loadingTimeout;
                    var loadingElement = $('#card-block').block({
                        message: '<div class="spinner-border text-primary" role="status"></div>',
                        css: {
                            backgroundColor: 'transparent',
                            border: '0'
                        },
                        overlayCSS: {
                            backgroundColor: '#fff',
                            opacity: 0.8
                        }
                    });

                    event.preventDefault();
                    var imageFile = $('#thumbnail')[0].files[0];
                    var title = $('#title').val();
                    var short_desc = $('#short_desc').val();
                    var peraih_prestasi = $('#peraih_prestasi').val();
                    var status = $('#bs-validation-country').val();
                    var content = $('#editor').html();
                    var formData = new FormData();
                    formData.append('extracurricular_thumbnail', imageFile);
                    formData.append('title', title);
                    formData.append('short_desc', short_desc);
                    formData.append('content', content);
                    formData.append('status', status);

                    var startTime = performance.now();
                    $.ajax({
                        url: '{{ route('admin.extracurricular.update', $extracurricular->id).'?_token='.csrf_token() }}',
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            var endTime = performance.now();
                            var responseTime = Math.round(endTime - startTime);
                            loadingElement.unblock();
                            loadingElement.remove();
                            Swal.fire({
                                title: 'Berhasl!',
                                text: 'Ekstrakurikular Berhasil Di Ubah!',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/bosa-admin/extracurricular';
                                }
                            });
                        },
                        error: function(xhr) {
                            loadingElement.unblock();
                            loadingElement.remove();
                            Swal.fire({
                                title: 'Error!',
                                text: 'Sepertinya gambar yang kamu upload terlalu besar!',
                                icon: 'error',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            });
                        },
                        beforeSend: function() {
                            var maxLoadingTime = 60000;
                            loadingTimeout = setTimeout(function() {
                                loadingElement.remove();
                            }, maxLoadingTime);
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