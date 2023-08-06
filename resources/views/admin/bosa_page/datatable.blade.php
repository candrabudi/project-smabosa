<script>
    $(function() {
        var table = $('#get-bosa-pages').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.bosa-pages.datatable') !!}',
            columns: [
                { data: 'no'},
                { data: 'page_name'},
                { data: 'page_desc'},
                { data: 'page_lang'},
                { data: 'page_status'},
                { 
                    data: 'id',
                    orderable: false,
                    render: function(id) {
                        return '<button class="my-1 btn btn-warning btn-xs edit-bosa-page" data-bs-toggle="offcanvas" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Edit</button> <button class="my-1 btn btn-danger btn-xs delete-bosa-page" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-trash me-1"></i> Hapus</button>';
                    },
                },
            ],
            responsive: true
        });
        $('#get-bosa-pages').on('click', '.edit-bosa-page', function() {
            var id = $(this).data('id');
            window.location = '/bosa-admin/bosa-pages/edit/' + id
        });
    });
</script>