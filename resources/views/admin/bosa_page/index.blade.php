@extends('admin.layouts.app')
@section('title')
Halaman
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Halaman /</span> Semua Data</h4>
    <p class="mb-4">Buat, edit, dan kelola Halam di situs Anda.</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="nav-align-top mb-4">
                    <div class="card-header p-3 d-flex mb-4">
                        <h5 class="align-self-center m-0">List Halaman</h5>
                        <a href="{{route('admin.bosa-pages.create')}}" class="btn btn-success btn-sm ms-auto btn-toggle-sidebar">
                            <i class="ti ti-plus me-1"></i>
                            <span class="align-middle">&NonBreakingSpace;Tambah Halaman</span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive">
                            <table class="dt-responsive table" id="get-bosa-pages">
                                <thead>
                                    <tr>
                                        <th width=50>No</th>
                                        <th>Nama Halaman</th>
                                        <th>Deskripsi</th>
                                        <th>Bahasa</th>
                                        <th>Status</th>
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
@endsection
@section('scripts')
@include('admin.bosa_page.datatable')
@endsection