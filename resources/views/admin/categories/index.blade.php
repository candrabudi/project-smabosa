@extends('admin.layouts.app')
@section('title')
Master Kategori
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Kategori /</span> Semua Data</h4>
    <p class="mb-4">Buat, edit, dan kelola Kategori di situs Anda.</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="nav-align-top mb-4">
                    <div class="card-header p-3 d-flex mb-4">
                        <h5 class="align-self-center m-0">List Kategori</h5>
                        <button class="btn btn-success btn-sm ms-auto btn-toggle-sidebar" data-bs-toggle="offcanvas" data-bs-target="#modalCategory" aria-controls="modalCategory">
                            <i class="ti ti-plus me-1"></i>
                            <span class="align-middle">&NonBreakingSpace;Tambah Kategori</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive">
                            <table class="dt-responsive table" id="get-categories">
                                <thead>
                                    <tr>
                                        <th width=50>No</th>
                                        <th>Kategori</th>
                                        <th width=180>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.categories.createOrUpdate')
@endsection
@section('scripts')
@include('admin.categories.datatable')
@include('admin.categories.store')
@include('admin.categories.update')
@include('admin.categories.delete')
@endsection