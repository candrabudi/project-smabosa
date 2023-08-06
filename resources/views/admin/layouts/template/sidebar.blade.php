<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('asset_be/img/logo/logo-bosa.png')}}" width="20" alt="">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">BOSA</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item active">
            <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-pencil"></i>
                <div data-i18n="Roles & Permissions">Posting</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('admin.posts')}}" class="menu-link">
                        <div data-i18n="Roles">Semua Post</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('admin.categories')}}" class="menu-link">
                        <div data-i18n="Permission">Kategori</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.bosa-pages')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-notebook"></i>
                <div data-i18n="Halaman">Halaman</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.home-information')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-notebook"></i>
                <div data-i18n="Informasi">Informasi</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.image-slider')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-album"></i>
                <div data-i18n="Image Slider">Image Slider</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.about-school')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-building-arch"></i>
                <div data-i18n="Tentang Sekolah">Tentang Sekolah</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.program.regular')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-building-arch"></i>
                <div data-i18n="Program Reguler">Program Reguler</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.program.bosaAis')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-building-arch"></i>
                <div data-i18n="Program Bosa Ais">Program Bosa Ais</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.facility')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-building-arch"></i>
                <div data-i18n="Fasilitas">Fasilitas</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.extracurricular')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-notebook"></i>
                <div data-i18n="Ekstrakurikular">Ekstrakurikular</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.announcement')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-speakerphone"></i>
                <div data-i18n="Pengumuman">Pengumuman</div>
            </a>
        </li> 
        <li class="menu-item">
            <a href="{{route('admin.teacher')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-school"></i>
                <div data-i18n="Guru">Guru</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.event')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-calendar-event"></i>
                <div data-i18n="Event">Event</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('admin.school-achievement')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-certificate-2"></i>
                <div data-i18n="Prestasi Sekolah">Prestasi Sekolah</div>
            </a>
        </li>
    </ul>
</aside>