<script>
    $(function() {
        var table = $('#get-about-school').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.about-school.datatable') !!}',
            columns: [
                { data: 'no'},
                { data: 'title'},
                { data: 'language'},
                { data: 'short_desc'},
                { 
                    data: 'id',
                    orderable: false,
                    render: function(id) {
                        return '<button class="my-1 btn btn-warning btn-xs edit-about-school" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Edit</button> <button class="my-1 btn btn-danger btn-xs delete-about-school" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-trash me-1"></i> Hapus</button>';
                    },
                },
            ],
            responsive: true
        });
        $('#get-about-school').on('click', '.edit-about-school', function() {
            var id = $(this).data('id');
            window.location = '/bosa-admin/about-school/edit/' + id
        });
    });
</script>