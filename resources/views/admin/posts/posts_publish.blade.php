<div class="card-header p-3 d-flex mb-4">
    <h5 class="align-self-center m-0">Postingan Publish</h5>
    <a href="{{route('admin.posts.create')}}" class="btn btn-success btn-sm ms-auto"><i class="fa fa-plus"></i> &NonBreakingSpace;Tambah Post Baru</a>
</div>
<div class="card-datatable table-responsive">
    <table class="datatables-basic table" id="get-post-publish">
        <thead>
            <tr>
                <th width=50>No</th>
                <th>Judul</th>
                <th>Tanggal Post</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th width=180>Aksi</th>
            </tr>
        </thead>
    </table>
</div>