<script>
    $('#get-categories').on('click', '.edit-category ', function() {
        var id = $(this).data('id');
        $.get("/bosa-admin/master-categories/edit/" + id, function(data) {
            let id = data.id;
            var status_slider_val = (data.status == 'Publish') ? $(".switch-input").prop("checked", true) : $(".switch-input").prop("checked", false);

            $('#titleSlider').val(data.title);
            $('.btn-add-event').removeAttr("id");
            $(".btn-add-event").attr("id", "edit-category");
            $("#edit-category").html("Edit Kategori");
            $("#edit-category").removeClass("btn-primary");
            $("#edit-category").addClass("btn-warning");
            $('#nameCategory').val(data.name);
            $('#languageCategory').val(data.language);
            $('#edit-category').click(function() {
                Swal.fire({
                    title: 'Yakin?',
                    text: "Kamu akan Melakukan Perubahan Data",
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
                        const formData = new FormData();
                        formData.append('name', $('#nameCategory').val());
                        formData.append('language', $('#languageCategory').val());
                        $.ajax({
                            url: '/bosa-admin/master-categories/update/' + id + '?_token=' + $('meta[name="csrf-token"]').attr('content'),
                            type: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                Swal.fire({
                                    title: 'Berhasl!',
                                    text: 'Data Berhasil Di Ubah!',
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
                            error: function(xhr, response) {
                                if (xhr.responseJSON.code == 400) {
                                    $('#spiner-button').addClass('d-none');
                                    $('#submit-post').removeClass('d-none');
                                    Swal.fire({
                                        title: 'Error!',
                                        text: xhr.responseJSON.message,
                                        icon: 'error',
                                        customClass: {
                                            confirmButton: 'btn btn-primary'
                                        },
                                        buttonsStyling: false
                                    });
                                } else if (xhr.responseJSON.code == 500) {
                                    $('#spiner-button').addClass('d-none');
                                    $('#submit-post').removeClass('d-none');
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'Something Wrong Error!',
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
                            title: 'Perubahan Dibatalkan',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            });
        })
    });
</script>