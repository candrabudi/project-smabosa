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
                        return '<button class="my-1 btn btn-warning btn-xs edit-category" data-bs-toggle="offcanvas" data-bs-target="#modalCategory" aria-controls="modalCategory" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Edit</button> <button class="my-1 btn btn-danger btn-xs delete-category" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-trash me-1"></i> Hapus</button>';
                    },
                },
            ],
            responsive: true
        });

    });
</script>