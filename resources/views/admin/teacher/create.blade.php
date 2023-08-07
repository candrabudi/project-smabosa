@extends('admin.layouts.app')
@section('title')
Tambah Guru
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Guru Sekolah /</span> Tambah Guru</h4>
    <div class="row mb-3">
        <div class="offcanvas-body pt-0" id="card-block">
            <form id="create-post-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <label class="form-label" for="teacher_name">Nama Guru</label>
                                <input type="text" class="form-control" id="teacher_name" required />
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <label class="form-label" for="teacher_subjects">Mapel Guru</label>
                                <input type="text" class="form-control" id="teacher_subjects" required />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label" for="teacher_type">Jenis Guru</label>
                                    <select class="form-select" id="teacher_type" required>
                                        <option value="">Pilih Jenis Guru</option>
                                        <option value="headmaster">Kepala Sekolah</option>
                                        <option value="viceprincipal">Wakil Kepala Sekolah</option>
                                        <option value="teacher">Guru</option>
                                        <option value="administration">Tatausaha</option>
                                        <option value="employee">Karyawan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="teacher_status">Status</label>
                                    <select class="form-select" id="teacher_status" required>
                                        <option value="">Pilih Status</option>
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>
                                    </select>
                                </div>
                                <button type="button" id="submit-post" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 mt-4">
                            <div class="card h-100">
                                <div class="card-header d-flex justify-content-between">
                                    <div class="card-title mb-0">
                                        <h5 class="mb-0">Foto Guru</h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <input class="form-control" id="teacher_photo" type="file" id="formFile" />
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
    $(document).ready(function() {
        $('#submit-post').click(function() {
            Swal.fire({
                title: 'Yakin?',
                text: "Kamu akan menambahkan Guru",
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
                    var startTime = performance.now();
                    event.preventDefault();
                    var imageFile = $('#teacher_photo')[0].files[0];
                    var teacher_name = $('#teacher_name').val();
                    var status = $('#teacher_status').val();
                    var teacher_type = $('#teacher_type').val();
                    var teacher_subjects = $('#teacher_subjects').val();
                    var formData = new FormData();
                    formData.append('teacher_photo', imageFile);
                    formData.append('teacher_name', teacher_name);
                    formData.append('status', status);
                    formData.append('teacher_type', teacher_type);
                    formData.append('teacher_subjects', teacher_subjects);

                    $.ajax({
                        url: '{{ route('admin.teacher.store').'?_token='.csrf_token() }}',
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            var endTime = performance.now();
                            var responseTime = Math.round(endTime - startTime);
                            loadingElement.unblock();
                            setTimeout(function() {
                                Swal.fire({
                                    title: 'Berhasl!',
                                    text: 'Guru Berhasil Di tambahkan!',
                                    icon: 'success',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = '/bosa-admin/teacher';
                                    }
                                });
                            }, responseTime + 300);
                        },
                        error: function(xhr) {
                            console.log(error)
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