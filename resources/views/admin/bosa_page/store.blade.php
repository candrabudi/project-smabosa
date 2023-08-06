<script>
    $(document).ready(function() {
        $('#submit-bosa-page').click(function() {
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
                formData.append('page_name', $('#page_name').val());
                formData.append('page_lang', $('#page_lang').val());
                formData.append('page_desc', $('#page_desc').val());
                formData.append('page_status', $('#page_status').val());
                formData.append('page_content', $('#editor').html());
                $.ajax({
                    url: '/bosa-admin/bosa-pages/store',
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
                                window.location.href = '/bosa-admin/bosa-pages';
                            }
                        });
                    },
                    error: function(xhr, response) {
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