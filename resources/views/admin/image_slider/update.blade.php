<script>
    $('#get-image-slider').on('click', '.edit-image-slider ', function() {
        var id = $(this).data('id');
        $.get("/bosa-admin/image-slider/edit/" + id, function(data) {
            let id = data.id;
            var status_slider_val = (data.status == 'Publish') ? $(".switch-input").prop("checked", true) : $(".switch-input").prop("checked", false);

            $('#titleSlider').val(data.title);
            $('.btn-add-event').removeAttr("id");
            $(".btn-add-event").attr("id", "edit-slider");
            $("#edit-slider").html("Edit Slider");
            $("#edit-slider").removeClass("btn-primary");
            $("#edit-slider").addClass("btn-warning");
            $('#languageSlider').val(data.language);
            $('#descriptionSlider').val(data.description);
            $('#statusSlider').val(status_slider_val);
            $('#edit-slider').click(function() {
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
                        let valueStatusSlider = $('.switch-input');
                        let status_slider_update = valueStatusSlider.prop('checked') ? 'Publish' : 'Draft';
                        formData.append('title_slider', $('#titleSlider').val());
                        formData.append('description_slider', $('#descriptionSlider').val());
                        formData.append('status_slider', status_slider_update);
                        formData.append('language_slider', $('#languageSlider').val());
                        formData.append('image', $('#imageSlider')[0].files[0]);
                        $.ajax({
                            url: '/bosa-admin/image-slider/update/' + id + '?_token=' + $('meta[name="csrf-token"]').attr('content'),
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
                                        window.location.href = '/bosa-admin/image-slider';
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