@extends('admin.layouts.app')
@section('title')
Tambah Post
@endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Posts /</span> Tambah Posting</h4>
    <div class="row mb-3">
        <div class="col-lg-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" required />
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="document-editor">
                        <div class="toolbar-container"></div>
                        <div class="content-container" style="pading: 20px;border: 2px solid #DEDEDE">
                            <div id="editor"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body py-0">
                    <div class="card-body">
                        <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" required />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
@endsection
@section('scripts')
<script>
    DecoupledEditor
        .create(document.querySelector('#editor'), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        })
        .then(editor => {
            const toolbarContainer = document.querySelector('.toolbar-container');

            toolbarContainer.prepend(editor.ui.view.toolbar.element);

            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
</script>

@endsection