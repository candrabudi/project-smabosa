@extends('admin.layouts.app')
@section('title')
Master Kategori
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Slide /</span> Edit Data</h4>
    <p class="mb-4">Buat, edit, dan kelola Kategori di situs Anda.</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="nav-align-top mb-0">
                    <div class="card-header p-3 d-flex mb-4">
                        <h5 class="align-self-center m-0">Edit Slider</h5>
                    </div>
                </div>
                <div class="card-body p-3">
                    <form action="{{route('admin.image-slider.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label class="form-label" for="formValidationName">Judul Slider</label>
                            <input
                                type="text"
                                id="titleSlider"
                                class="form-control"
                                placeholder="Judul Slider"
                                name="title_slider"
                                value="{{$image_slider->title}}"
                            />
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="form-label" for="formValidationName">Deskripsi Slider</label>
                            <textarea
                                class="form-control"
                                id="descriptionSlider"
                                name="description_slider"
                                rows="3"
                                value=""
                            >{{$image_slider->description}}</textarea>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="form-label" for="basic-default-upload-file">Image</label>
                            <input type="file" class="form-control" id="thumbnail" name="image" required />
                        </div>
                        <div class="col-md-12">
                            <button type="button" id="submit-category" class="btn btn-primary mt-3">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
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
                    var imageFile = $('#thumbnail')[0].files[0];
                    var title_slider = $('#titleSlider').val();
                    var description_slider = $('#descriptionSlider').val();
                    var formData = new FormData();
                    formData.append('title_slider', title_slider);
                    formData.append('description_slider', description_slider);
                    formData.append('image', imageFile);

                    $.ajax({
                        url: '{{ route('admin.image-slider.store').'?_token='.csrf_token() }}',
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
                                    window.location.href = '/bosa-admin/image-slider';
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