<script>
    $(function() {
        var table = $('#get-home-information').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.home-information.datatable') !!}',
            columns: [
                { data: 'no'},
                { data: 'info_name'},
                { data: 'info_position'},
                { data: 'info_lang'},
                { 
                    data: 'id',
                    orderable: false,
                    render: function(id) {
                        return '<button class="my-1 btn btn-warning btn-xs edit-home-information" data-bs-toggle="offcanvas" data-bs-target="#modalHomeInformation" aria-controls="modalHomeInformation" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Edit</button> ';
                    },
                },
            ],
            responsive: true
        });

    });
</script>