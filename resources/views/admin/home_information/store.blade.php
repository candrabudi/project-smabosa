<script>
    $(document).ready(function() {
        $('#submit-information').click(function() {
            $('#card-block').block({
                message: '<div class="spinner-border text-primary" role="status"></div>',
                timeout: 1200,
                css: {
                    backgroundColor: 'transparent',
                    border: '0'
                },
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8
                }
            });
            setTimeout(function() {
                var formData = new FormData();
                formData.append('info_name', $('#info_name').val());
                formData.append('info_lang', $('#info_lang').val());
                formData.append('info_position', $('#info_position').val());
                formData.append('info_image', $('#info_image')[0].files[0]);

                $.ajax({
                    url: '/bosa-admin/home-information/store',
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
                                window.location.href = '/bosa-admin/home-information';
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
            }, 1200);
        });
    });
</script>