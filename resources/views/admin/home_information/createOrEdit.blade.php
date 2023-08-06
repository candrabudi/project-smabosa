<div class="offcanvas offcanvas-end event-sidebar col-lg-12" tabindex="-1" id="modalHomeInformation" aria-labelledby="modalHomeInformationLabel">
    <div class="offcanvas-header my-1">
        <h5 class="offcanvas-title" id="modalHomeInformationLabel">Edit Informasi</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body pt-0">
        <form class="event-form pt-0" id="categoryForm" onsubmit="return false">
            <div class="mb-3">
                <label class="form-label" for="info_name">Nama</label>
                <input type="hidden" class="form-control" id="info_id" name="info_id" placeholder="" />
                <input type="text" class="form-control" id="info_name" name="info_name" placeholder="" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="info_lang">Bahasa</label>
                <select class="select2 select-event-label form-select" id="info_lang" name="info_lang">
                    <option data-label="primary" value="Indonesia" selected>Indonesia</option>
                    <option data-label="primary" value="English">English</option>
                    <option data-label="primary" value="Jawa">Jawa</option>
                </select>
            </div>
             <div class="mb-3">
                <label class="form-label" for="info_position">Posisi</label>
                <select class="select2 select-event-label form-select" id="info_position" name="info_position">
                    <option data-label="primary" value="1" selected>1</option>
                    <option data-label="primary" value="2">2</option>
                    <option data-label="primary" value="3">3</option>
                    <option data-label="primary" value="4">4</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="image-input border">
                    <input type="file" name="file" id="info_image" accept="image/png,image/jpeg" max-size="10000000">
                    <input type="hidden" name="">
                    <img src="" alt="">
                </label>
            </div>
            <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                <div>
                    <button type="submit" id="edit-home-information" class="btn btn-primary btn-add-event me-sm-3 me-1">Tambah</button>
                    <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1" data-bs-dismiss="offcanvas">
                        Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>