<script>
    $(function() {
        var table = $('#get-image-slider').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.image-slider.datatable') !!}',
            columns: [
                { data: 'no'},
                { data: 'title'},
                { data: 'description'},
                { 
                    data: 'id',
                    orderable: false,
                    render: function(id) {
                        return '<button class="my-1 btn btn-warning btn-xs edit-image-slider btn-toggle-sidebar" data-bs-toggle="offcanvas" data-bs-target="#addImageSlider" aria-controls="addImageSlider" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Edit</button> <button class="my-1 btn btn-danger btn-xs delete-category" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-trash me-1"></i> Hapus</button>';
                    },
                },
            ],
            responsive: true
        });

    });
</script>