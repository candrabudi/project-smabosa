<div class="offcanvas offcanvas-end event-sidebar col-lg-12" tabindex="-1" id="modalCategory" aria-labelledby="modalCategoryLabel">
    <div class="offcanvas-header my-1">
        <h5 class="offcanvas-title" id="modalCategoryLabel">Tambah Kategori</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body pt-0">
        <form class="event-form pt-0" id="categoryForm" onsubmit="return false">
            <div class="mb-3">
                <label class="form-label" for="nameCategory">Nama Kategori</label>
                <input type="text" class="form-control" id="nameCategory" name="nameCategory" placeholder="Event Title" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="languageCategory">Bahasa</label>
                <select class="select2 select-event-label form-select" id="languageCategory" name="languageCategory">
                    <option data-label="primary" value="Indonesia" selected>Indonesia</option>
                    <option data-label="primary" value="English">English</option>
                    <option data-label="primary" value="Jawa">Jawa</option>
                </select>
            </div>
            <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                <div>
                    <button type="submit" id="submit-category" class="btn btn-primary btn-add-event me-sm-3 me-1">Tambah</button>
                    <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1" data-bs-dismiss="offcanvas">
                        Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>