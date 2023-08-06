@extends('admin.layouts.app')
@section('title')
Edit Halaman
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Halaman /</span> Tambah Halaman</h4>
    <div class="row mb-3">
        <div class="offcanvas-body pt-0" id="card-block">
            <form id="create-pages-form" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <label class="form-label" for="page_name">Nama Halaman</label>
                                <input type="hidden" class="form-control" value="{{$bosa_page->id}}" id="page_id" required />
                                <input type="text" class="form-control" value="{{$bosa_page->page_name}}" id="page_name" required />
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="document-editor">
                                    <div class="toolbar-container"></div>
                                    <div class="content-container">
                                        <div id="editor">
                                            <?php echo $bosa_page->page_content ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="page_status">Status</label>
                                        <select class="form-select" id="page_status" required>
                                            <option value="Publish" {{$bosa_page->page_status == "Publish" ? 'selected' : ''}}>Publish</option>
                                            <option value="Draft" {{$bosa_page->page_status == "Draft" ? 'selected' : ''}}>Draft</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="page_lang">Bahasa</label>
                                        <select class="form-select" id="page_lang" required>
                                            <option value="Indonesia"  {{$bosa_page->page_status == "Indonesia" ? 'selected' : ''}}>Indonesia</option>
                                            <option value="English"  {{$bosa_page->page_status == "English" ? 'selected' : ''}}>English</option>
                                            <option value="Jawa"  {{$bosa_page->page_status == "Jawa" ? 'selected' : ''}}>Jawa</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="button" id="submit-bosa-page" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <label class="form-label" for="page_desc">Deskripsi</label>
                                <textarea name="" id="page_desc" cols="30" rows="5" class="form-control">{{$bosa_page->page_desc}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
    #editor {
        min-height: 300px;
    }

    .document-editor {
        padding: 10px;
        border: 1px solid #DFE4E6;
        border-bottom-color: #cdd0d2;
        border-right-color: #cdd0d2;
        border-radius: 2px;
        max-height: 700px;
        display: flex;
        flex-flow: column nowrap;
        background-color: #FFF;
    }

    .toolbar-container {
        z-index: 1;
        position: relative;
        box-shadow: 2px 2px 1px rgba(0, 0, 0, .05);
    }

    .toolbar-container .ck.ck-toolbar {
        border-top-width: 0;
        border-left-width: 0;
        border-right-width: 0;
        border-radius: 0;
    }

    .content-container {
        padding: var(--ck-sample-base-spacing);
        background: #eee;
        overflow-y: scroll;
        padding: 20px;
        box-sizing: border-box;
    }

    .content-container #editor {
        border-top-left-radius: 0;
        border-top-right-radius: 0;

        width: 20.8cm;
        min-height: 550px;
        padding: 1cm 1cm 2cm;
        margin: 0 auto;
        box-shadow: 2px 2px 1px rgba(0, 0, 0, .05);
    }

    .ck-content {
        background-color: #FFF;
    }

    .spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left-color: #3498db;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/flatpickr/flatpickr.css')}}" /> 
<link rel="stylesheet" href="{{ asset('backend/vendor/libs/select2/select2.css') }}" />
<script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('scripts')
<script src="{{ asset('backend/vendor/libs/select2/select2.js') }}"></script>
<script src="{{ asset('backend/js/forms-selects.js') }}"></script>
<script src="{{ asset('backend/vendor/libs/flatpickr/flatpickr.js')}}"></script>
<script src="{{ asset('backend/js/forms-pickers.js')}}"></script>
@include('admin.bosa_page.editorJs')
@include('admin.bosa_page.update')
@endsection