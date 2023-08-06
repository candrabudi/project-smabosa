@extends('admin.layouts.app')
@section('title')
Master Kategori
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Slide /</span> Semua Data</h4>
    <p class="mb-4">Buat, edit, dan kelola Kategori di situs Anda.</p>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="nav-align-top mb-4">
                    <div class="card-header p-3 d-flex mb-4">
                        <h5 class="align-self-center m-0">List Slider</h5>
                        <button class="btn btn-success btn-sm ms-auto btn-toggle-sidebar" data-bs-toggle="offcanvas" data-bs-target="#addImageSlider" aria-controls="addImageSlider">
                            <i class="ti ti-plus me-1"></i>
                            <span class="align-middle">&NonBreakingSpace;Tambah Slider</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="card-datatable table-responsive">
                            <table class="dt-responsive table" id="get-image-slider">
                                <thead>
                                    <tr>
                                        <th width=50>No</th>
                                        <th width=20%>Judul</th>
                                        <th width=55%>Description</th>
                                        <th width=120>Aksi</th>
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
@include('admin.image_slider.addOrUpdate')
@endsection
@section('scripts')
@include('admin.image_slider.store')
@include('admin.image_slider.update')
@include('admin.image_slider.datatable')
@include('admin.image_slider.delete')
@endsection