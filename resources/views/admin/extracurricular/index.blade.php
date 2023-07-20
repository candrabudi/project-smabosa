@extends('admin.layouts.app')
@section('title')
Ekstrakurikular
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Ekstrakurikular /</span> Semua Data</h4>
    <p class="mb-4">Buat, edit, dan kelola Ekstrakurikular di situs Anda.</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="nav-align-top mb-4">
                    <div class="card-header p-3 d-flex mb-4">
                        <h5 class="align-self-center m-0">List Ekstrakurikular</h5>
                        <a href="{{route('admin.extracurricular.create')}}" class="btn btn-success btn-sm ms-auto"><i class="fa fa-plus"></i> &NonBreakingSpace;Tambah Ekstrakurikular</a>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive">
                            <table class="dt-responsive table" id="get-extracurricular">
                                <thead>
                                    <tr>
                                        <th width=50>No</th>
                                        <th>Judul</th>
                                        <th>Deskripsi Singkat</th>
                                        <th width=200>Aksi</th>
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
@endsection
@section('scripts')
<script>
    $(function() {
        var table = $('#get-extracurricular').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.extracurricular.datatable') !!}',
            columns: [
                { data: 'no'},
                { data: 'title'},
                { data: 'short_desc'},
                { 
                    data: 'id',
                    orderable: false,
                    render: function(id) {
                        return '<button class="my-1 btn btn-warning btn-xs edit-extracurricular"  style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Edit</button> <button class="my-1 btn btn-danger btn-xs delete-extracurricular" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-trash me-1"></i> Hapus</button>';
                    },
                },
            ],
            responsive: true
        });

    });
    $('#get-extracurricular').on('click', '.edit-extracurricular ', function() {
        var id = $(this).data('id');
        window.location = '/bosa-admin/extracurricular/edit/' + id
    });
</script>
<script>
    $(function() {
        $('#get-extracurricular').on('click', '.delete-extracurricular', function() {
            var id = $(this).data('id');

            Swal.fire({
                text: 'Apakah kamu yakin mau menghapus data?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn btn-primary me-2',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false,
                showLoaderOnConfirm: true,
                allowOutsideClick: () => !Swal.isLoading(),
                preConfirm: () => {
                    return $.ajax({
                        url: '/bosa-admin/extracurricular/delete/'+id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                           return response;
                        },
                        error: function() {
                            Swal.showValidationMessage(
                                'Request failed'
                            )
                        }
                    });
                },
            }).then(function(result) {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Dihapus!',
                        text: 'Data kamu berhasil di hapus. kamu akan segera dialihkan',
                        timer: 2300,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                b.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                        },
                        customClass: {
                            confirmButton: 'btn btn-success d-none'
                        }
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                            window.location = '/bosa-admin/extracurricular'
                        }
                    });
                }
            });
        });
    });
</script>
@endsection