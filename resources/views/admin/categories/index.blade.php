@extends('admin.layouts.app')
@section('title')
Master Kategori
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Kategori /</span> Semua Data</h4>
    <p class="mb-4">Buat, edit, dan kelola Kategori di situs Anda.</p>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="nav-align-top mb-4">
                    <div class="card-header p-3 d-flex mb-4">
                        <h5 class="align-self-center m-0">List Kategori</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive">
                            <table class="dt-responsive table" id="get-categories">
                                <thead>
                                    <tr>
                                        <th width=50>No</th>
                                        <th>Kategori</th>
                                        <th width=180>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header p-3 d-flex mb-4">
                    <h5 class="align-self-center m-0">Tambah Kategori</h5>
                </div>
                <div class="card-body">
                    <form id="create-post-form" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label class="form-label" for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama" required />
                        </div>
                        <button type="button" id="submit-category" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function() {
        var table = $('#get-categories').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.categories.datatable') !!}',
            columns: [
                { data: 'no'},
                { data: 'name'},
                { 
                    data: 'id',
                    orderable: false,
                    render: function(id) {
                        return '<button class="my-1 btn btn-warning btn-xs edit-category "  style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Edit</button> <button class="my-1 btn btn-danger btn-xs delete-category" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-trash me-1"></i> Hapus</button>';
                    },
                },
            ],
            responsive: true
        });

    });
    $(document).ready(function() {
        $('#submit-category').click(function() {
            Swal.fire({
                title: 'Yakin?',
                text: "Kamu akan menambahkan kategori",
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
                        url: '{{ route('admin.categories.store').'?_token='.csrf_token() }}',
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasl!',
                                text: 'Kategori Berhasil Di tambahkan!',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    var table = $('#get-categories').DataTable();

                                    // window.location.href = '/bosa-admin/master-categories';
                                    table.ajax.reload();
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

    $('#get-categories').on('click', '.edit-category ', function() {
        var id = $(this).data('id');
        window.location = '/bosa-admin/master-categories/edit/' + id
    });
</script>
<script>
    $(function() {
        $('#get-categories').on('click', '.delete-category', function() {
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
                        url: '/bosa-admin/master-categories/delete/'+id,
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
                            window.location = '/bosa-admin/master-categories'
                        }
                    });
                }
            });
        });
    });
</script>
@endsection