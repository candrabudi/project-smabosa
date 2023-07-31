<div class="offcanvas offcanvas-end event-sidebar col-lg-12" tabindex="-1" id="addImageSlider" aria-labelledby="addImageSliderLabel">
    <div class="offcanvas-header my-1">
        <h5 class="offcanvas-title" id="addImageSliderLabel">Tambah Slider</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body pt-0">
        <form class="event-form pt-0" id="eventForm" onsubmit="return false">
            <div class="mb-3">
                <label class="form-label" for="titleSlider">Judul Slider</label>
                <input type="text" class="form-control" id="titleSlider" name="titleSlider" placeholder="Event Title" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="languageSlider">Bahasa</label>
                <select class="select2 select-event-label form-select" id="languageSlider" name="languageSlider">
                    <option data-label="primary" value="Indonesia" selected>Indonesia</option>
                    <option data-label="primary" value="English">English</option>
                    <option data-label="primary" value="Jawa">Jawa</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="descriptionSlider">Deskripsi</label>
                <textarea class="form-control" name="descriptionSlider" id="descriptionSlider"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label" for="imageSlider">Image</label>
                <input type="file" class="form-control" id="imageSlider" name="imageSlider" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="statusSlider">Status</label>
                <div class="form-group">
                    <label class="switch switch-square switch-lg">
                        <input type="checkbox" class="switch-input" />
                        <span class="switch-toggle-slider">
                            <span class="switch-on">
                                <i class="ti ti-check"></i>
                            </span>
                            <span class="switch-off">
                                <i class="ti ti-x"></i>
                            </span>
                        </span>
                    </label>
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                <div>
                    <button type="submit" id="submit-slider" class="btn btn-primary btn-add-event me-sm-3 me-1">Tambah</button>
                    <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1" data-bs-dismiss="offcanvas">
                        Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>