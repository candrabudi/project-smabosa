@extends('admin.layouts.app')
@section('title')
Edit Event
@endsection
@section('content')
@cache('my-cache-key', 3600)
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-1"><span class="text-muted fw-light">Event /</span> Edit Event</h4>
    <div class="row mb-3">
        <form id="create-post-form" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="form-label" for="title">Judul</label>
                            <input type="text" class="form-control" id="title" value="{{$event->title}}" required />
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <label class="form-label" for="judul">Deskripsi Singkat</label>
                            <textarea name="" id="short_desc" cols="30" rows="5" class="form-control" >{{$event->short_desc}}</textarea>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="document-editor">
                                <div class="toolbar-container"></div>
                                <div class="content-container" style="pading: 20px;border: 2px solid #DEDEDE">
                                    <div id="editor"><?php echo $event->content ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Event</label>
                                <input type="text" class="form-control" id="event_title" value="{{$event->event}}" />
                            </div>
                            <div class="mb-3">
                                <label for="flatpickr-date" class="form-label">Tanggal Event</label>
                                <input type="text" class="form-control" placeholder="YYYY-MM-DD" value="{{$event->event_date}}" id="flatpickr-datetime" />
                            </div>
                            <div class="mb-3">
                                <label for="flatpickr-date" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="location_title" value="{{$event->location}}" />
                            </div>
                            <button type="button" id="submit-post" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-12 mt-4">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between">
                                <div class="card-title mb-0">
                                    <h5 class="mb-0">Thumbnail</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <input class="form-control" id="thumbnail" type="file" id="formFile" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endcache
@endsection
@section('styles')
<style>
    #editor{
        min-height: 300px;
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
<script>
    DecoupledEditor
        .create(document.querySelector('#editor'), {
            ckfinder: {
                uploadUrl: '{{route('admin.posts.upload').'?_token='.csrf_token()}}',
            }
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

<script>
    $(document).ready(function() {
        $('#submit-post').click(function() {
            Swal.fire({
                title: 'Yakin?',
                text: "Kamu akan Edit Event",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                customClass: {
                    confirmButton: 'btn btn-primary me-3',
                    cancelButton: 'btn btn-label-secondary'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    event.preventDefault();
                    var imageFile = $('#thumbnail')[0].files[0];
                    var title = $('#title').val();
                    var short_desc = $('#short_desc').val();
                    var event_title = $('#event_title').val();
                    var location_title = $('#location_title').val();
                    var content = $('#editor').html();
                    var event_date = $('#flatpickr-datetime').val();
                    var formData = new FormData();
                    formData.append('event_thumbnail', imageFile);
                    formData.append('title', title);
                    formData.append('short_desc', short_desc);
                    formData.append('content', content);
                    formData.append('event', event_title);
                    formData.append('event_date', event_date);
                    formData.append('location', location_title);

                    $.ajax({
                        url: '{{ route('admin.event.update',$event->id).'?_token='.csrf_token() }}',
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                title: 'Berhasl!',
                                text: 'Event Berhasil Di Edit!',
                                icon: 'success',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                buttonsStyling: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/bosa-admin/event';
                                }
                            });
                        },
                        error: function(xhr) {
                            console.log(error)
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'info',
                        title: 'Perubahan Dibatalkan',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });
    });
</script>

@endsection