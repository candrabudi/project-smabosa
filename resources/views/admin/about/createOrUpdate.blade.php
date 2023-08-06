<div class="offcanvas offcanvas-end event-sidebar col-lg-12" style="width: 85%;" tabindex="-1" id="modalAboutSchool" aria-labelledby="modalAboutSchoolLabel">
    <div class="offcanvas-header my-1">
        <h5 class="offcanvas-title" id="modalAboutSchoolLabel">Tambah Tentang Sekolah</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body pt-0" id="card-block">
        <form class="event-form pt-0" id="categoryForm" onsubmit="return false">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-3">
                        <label class="form-label" for="titleAbout">Tentang Sekolah</label>
                        <input type="text" class="form-control" id="titleAbout" name="titleAbout" placeholder="Tentang Sekolah" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="titleAbout">Tentang Sekolah</label>
                        <div class="document-editor">
                            <div class="toolbar-container"></div>
                            <div class="content-container">
                                <div id="editor" class="content-about-school">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mb-3">
                        <label class="form-label" for="languageAbout">Bahasa</label>
                        <select class="select2 select-event-label form-select" id="languageAbout" name="languageAbout">
                            <option data-label="primary" value="Indonesia" selected>Indonesia</option>
                            <option data-label="primary" value="English">English</option>
                            <option data-label="primary" value="Jawa">Jawa</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="shortDescAbout">Deskripsi Singkat</label>
                        <textarea name="shortDescAbout" id="shortDescAbout" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="image-input border">
                            <input type="file" name="file" id="imageAbout" accept="image/png,image/jpeg" max-size="10000000">
                            <input type="hidden" name="">
                            <img src="" alt="">
                        </label>
                    </div>
                    <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                        <div>
                            <button type="submit" id="submit-about" class="btn btn-primary btn-card-block-overlay-2">
                                Tambah
                            </button>
                            <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1" data-bs-dismiss="offcanvas">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>