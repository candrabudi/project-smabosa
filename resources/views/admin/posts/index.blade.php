@extends('admin.layouts.app')
@section('title')
Post
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Posts /</span> Semua Data</h4>
    <p class="mb-4">Buat, edit, dan kelola postingan di situs Anda.</p>
    <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="true">
                    <i class="tf-icons ti ti-notes ti-xs me-1"></i> Publish
                    <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-success ms-1">{{$post_publish}}</span>
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="false">
                    <i class="tf-icons ti ti-notes-off ti-xs me-1"></i> Draft
                    <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-primary ms-1">{{$post_draft}}</span>
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-messages" aria-controls="navs-pills-justified-messages" aria-selected="false">
                    <i class="tf-icons ti ti-recycle ti-xs me-1"></i> Di Hapus
                    <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger ms-1">{{$post_delete}}</span>
                </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                @include('admin.posts.posts_publish')
            </div>
            <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                @include('admin.posts.posts_draft')
            </div>
            <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
                @include('admin.posts.posts_delete')
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        var table = $('#get-post-publish').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.posts.datatable.publish') !!}',
            columns: [
                { data: 'no'},
                { data: 'post_title'},
                { data: 'post_date'},
                { data: 'author'},
                { data: 'post_categories' },
                { 
                    data: 'id',
                    orderable: false,
                    render: function(id) {
                        return '<button class="my-1 btn btn-warning btn-xs edit-post"  style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Edit</button> <button class="my-1 btn btn-danger btn-xs delete-post" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-trash me-1"></i> Hapus</button>';
                    },
                },
            ],
            responsive: true
        });
    });
    $('#get-post-publish').on('click', '.edit-post', function() {
        var id = $(this).data('id');
        window.location = '/bosa-admin/posts/edit/' + id
    });
</script>
<script>
    $(function() {
        var table = $('#get-post-delete').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.posts.datatable.delete') !!}',
            columns: [
                { data: 'no'},
                { data: 'post_title'},
                { data: 'post_date'},
                { data: 'author'},
                { data: 'post_categories' },
                { 
                    data: 'id',
                    orderable: false,
                    render: function(id) {
                        return '<button class="my-1 btn btn-warning btn-xs edit-post"  style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Edit</button> <button class="my-1 btn btn-danger btn-xs delete-post" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-trash me-1"></i> Hapus</button>';
                    },
                },
            ],
            responsive: true
        });

        $('#get-post-delete').on('click', '.edit-post', function() {
            var id = $(this).data('id');
            window.location = '/bosa-admin/posts/edit/' + id
        });
    });
</script>
<script>
    $(function() {
        var table = $('#get-post-draft').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.posts.datatable.draft') !!}',
            columns: [
                { data: 'no'},
                { data: 'post_title'},
                { data: 'post_date'},
                { data: 'author'},
                { data: 'post_categories' },
                { 
                    data: 'id',
                    orderable: false,
                    render: function(id) {
                        return '<button class="my-1 btn btn-warning btn-xs edit-post"  style="display: inline-block;" data-id="' + id + '"><i class="ti ti-edit me-1"></i> Edit</button> <button class="my-1 btn btn-danger btn-xs delete-post" style="display: inline-block;" data-id="' + id + '"><i class="ti ti-trash me-1"></i> Hapus</button>';
                    },
                },
            ],
            responsive: true
        });

        $('#get-post-draft').on('click', '.edit-post', function() {
            var id = $(this).data('id');
            window.location = '/bosa-admin/posts/edit/' + id
        });
    });
</script>
@endsection