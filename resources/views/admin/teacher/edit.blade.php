@extends('admin.layouts.app')
@section('title')
Edit Guru
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Guru Sekolah /</span> Edit Guru</h4>
    <div class="row mb-3">
        <form id="create-post-form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="form-label" for="teacher_name">Nama Guru</label>
                            <input type="text" class="form-control" id="teacher_name" value="{{$teacher->teacher_name}}" required />
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="form-label" for="teacher_subjects">Mapel Guru</label>
                            <input type="text" class="form-control" id="teacher_subjects" value="{{$teacher->teacher_subjects}}" required />
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
                                    <option value="tetap" {{($teacher->teacher_type == 'tetap') ? 'selected' : ''}}>Tetap</option>
                                    <option value="tatausaha" {{($teacher->teacher_type == 'tatausaha') ? 'selected' : ''}}>Tatausaha</option>
                                    <option value="karyawan" {{($teacher->teacher_type == 'karyawan') ? 'selected' : ''}}>Karyawan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="teacher_status">Status</label>
                                <select class="form-select" id="teacher_status" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Publish" {{($teacher->status == 'Publish') ? 'selected' : ''}}>Publish</option>
                                    <option value="Draft" {{($teacher->status == 'Draft') ? 'selected' : ''}}>Draft</option>
                                </select>
                            </div>
                            <button type="button" id="submit-post" class="btn btn-warning">Edit</button>
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
<script src="{{ asset('asset_be/vendor/libs/toastr/toastr.js')}}"></script>
<script src="{{ asset('asset_be/js/forms-pickers.js')}}"></script>
<script src="{{ asset('asset_be/js/ui-toasts.js')}}"></script>
<script>
    $(document).ready(function() {
        var i = -1;
        var toastCount = 0;
        var $toastlast;
        var getMessage = function () {
            var msgs = [
            "Don't be pushed around by the fears in your mind. Be led by the dreams in your heart.",
            '<div class="mb-3"><input class="input-small form-control" value="Textbox"/>&nbsp;<a href="http://johnpapa.net" target="_blank">This is a hyperlink</a></div><div class="d-flex"><button type="button" id="okBtn" class="btn btn-primary btn-sm me-2">Close me</button><button type="button" id="surpriseBtn" class="btn btn-sm btn-secondary">Surprise me</button></div>',
            'Live the Life of Your Dreams',
            'Believe in Your Self!',
            'Be mindful. Be grateful. Be positive.',
            'Accept yourself, love yourself!'
            ];
            i++;
            if (i === msgs.length) {
            i = 0;
            }
            return msgs[i];
        };
        const toastAnimationExample = document.querySelector('.toast-ex'),
            toastPlacementExample = document.querySelector('.toast-placement-ex'),
            toastAnimationBtn = document.querySelector('#showToastAnimation'),
            toastPlacementBtn = document.querySelector('#showToastPlacement');
        let selectedType, selectedAnimation, selectedPlacement, toast, toastAnimation, toastPlacement;
        $('#submit-post').click(function() {
            Swal.fire({
                title: 'Yakin?',
                text: "Kamu akan Mengubah Data Guru",
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
                        url: '{{ route('admin.teacher.update', $teacher->id).'?_token='.csrf_token() }}',
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            var endTime = performance.now();
                            var responseTime = Math.round(endTime - startTime);
                            loadingElement.unblock();
                            Swal.fire({
                                title: 'Berhasl!',
                                text: 'Guru Berhasil Di Edit!',
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
                        },
                        error: function(xhr) {
                            loadingElement.unblock();
                            const sentence = "top-0 end-0";
                            const words = sentence.split(' ');
                            selectedType = "text-danger";
                            selectedPlacement = sentence.split(' ');
                            toastPlacementExample.querySelector('.ti').classList.add(selectedType);
                            DOMTokenList.prototype.add.apply(toastPlacementExample.classList, selectedPlacement);
                            toastPlacement = new bootstrap.Toast(toastPlacementExample);
                            toastPlacement.show();
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