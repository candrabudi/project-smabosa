<script>
    $(document).ready(function() {
        $('#submit-slider').click(function() {
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

                    const valueStatusSlider = $('.switch-input');
                    const status_slider = valueStatusSlider.prop('checked') ? 'Publish' : 'Draft';
                    const formData = new FormData();
                    formData.append('title_slider', $('#titleSlider').val());
                    formData.append('description_slider', $('#descriptionSlider').val());
                    formData.append('status_slider', status_slider);
                    formData.append('language_slider', $('#languageSlider').val());
                    formData.append('image', $('#imageSlider')[0].files[0]);
                    $.ajax({
                        url: '/bosa-admin/image-slider/store',
                        type: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasil!',
                                text: 'Data Berhasil Ditambahkan!',
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
                        error: function(xhr, response) {
                            $('#spiner-button').addClass('d-none');
                            $('#submit-post').removeClass('d-none');
                            if (xhr.responseJSON && xhr.responseJSON.code == 400) {
                                Swal.fire({
                                    title: 'Error!',
                                    text: xhr.responseJSON.message,
                                    icon: 'error',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Something Went Wrong!',
                                    icon: 'error',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                    buttonsStyling: false
                                });
                            }
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