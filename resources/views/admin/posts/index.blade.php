@extends('admin.layouts.app')
@section('title')
Dashboard
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Posts /</span> Semua Data</h4>
    <p class="mb-4">Create, edit, and manage the posts on your site.</p>
    <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="true">
                    <i class="tf-icons ti ti-notes ti-xs me-1"></i> Publish
                    <span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger ms-1">3</span>
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="false">
                    <i class="tf-icons ti ti-notes-off ti-xs me-1"></i> Draft
                </button>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-messages" aria-controls="navs-pills-justified-messages" aria-selected="false">
                    <i class="tf-icons ti ti-recycle ti-xs me-1"></i> Di Hapus
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