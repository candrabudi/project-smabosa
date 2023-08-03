<script>
    $('#get-about-school').on('click', '.edit-about-school ', function() {
        var id = $(this).data('id');
        $.get("/bosa-admin/about-school/edit/" + id, function(data) {
            let id = data.id;
            var status_slider_val = (data.status == 'Publish') ? $(".switch-input").prop("checked", true) : $(".switch-input").prop("checked", false);

            $('#titleSlider').val(data.title);
            $('.btn-card-block-overlay-2').removeAttr("id");
            $('.content-about-school').removeAttr("id");
            $('.content-about-school').attr("id", "editor-update");
            $(".btn-card-block-overlay-2").attr("id", "edit-about-school");
            $(".offcanvas-title").html("Edit Tentang Sekolah");
            $("#edit-about-school").html("Edit Kategori");
            $("#edit-about-school").removeClass("btn-primary");
            $("#edit-about-school").addClass("btn-warning");
            $('#titleAbout').val(data.title);
            $('#shortDescAbout').val(data.short_desc);
            DecoupledEditor
                .create(document.querySelector('#editor-update'), {
                        ckfinder: {uploadUrl: '{{route('admin.posts.upload').'?_token='.csrf_token()}}',
                    }
                })
                .then(editor => {
                    const toolbarContainer = document.querySelector('.toolbar-container');

                    toolbarContainer.prepend(editor.ui.view.toolbar.element);

                    window.editor = editor;
                })
                .catch(err => {
                    console.error(err.stack);
                });

            function clearEditor() {
                var editor = DecoupledEditor.instances[0];
                editor.setData('');
            }
            $('#edit-about-school').click(function() {
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