@extends('admin.layouts.app')
@section('title')
Edit Kategori
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Kategori /</span> Edit</h4>
    <p class="mb-4">Buat, edit, dan kelola Kategori di situs Anda.</p>
    <div class="row">
        <div class="col-md-4">
            <form id="create-post-form" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header p-3 d-flex mb-4">
                        <a href="{{route('admin.categories')}}" class="btn btn-primary btn-sm back-category"><span class="ti ti-arrow-back-up"></span></a>
                        <h5 class="align-self-center m-0">&nbsp;&nbsp;Edit Kategori</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="form-label" for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" value="{{$master_category->name}}" id="nama" required />
                        </div>
                        <button type="button" id="submit-category" class="btn btn-warning">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#submit-category').click(function() {
            Swal.fire({
                title: 'Yakin?',
                text: "Kamu akan Edit kategori",
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
                    var nama = $('#nama').val();
                    var formData = new FormData();
                    formData.append('nama', nama);

                    $.ajax({
                        url: '{{ route('admin.categories.update', $master_category->id).'?_token='.csrf_token() }}',
                        type : "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasl!',
                                text: 'Kategori Berhasil Di Edit!',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/bosa-admin/master-categories';
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
                        title: 'Edit Dibatalkan',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    });
</script>
@endsection