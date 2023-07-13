<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer" x="0px" y="0px" width="32" height="32" viewBox="0 0 60 60" enable-background="new 0 0 64 64" xml:space="preserve">
                    <path fill="#CCE4FF" d="M32,10c-12.15,0-22,9.85-22,22c0,12.15,9.85,22,22,22s22-9.85,22-22C54,19.85,44.15,10,32,10z M23,37  c-2.76,0-5-2.24-5-5s2.24-5,5-5s5,2.24,5,5S25.76,37,23,37z M41,37c-2.76,0-5-2.24-5-5s2.24-5,5-5s5,2.24,5,5S43.76,37,41,37z" />
                    <path fill="#007AFF" d="M32,8C18.766,8,8,18.766,8,32s10.766,24,24,24c13.233,0,24-10.766,24-24S45.233,8,32,8z M32,52  c-11.028,0-20-8.972-20-20c0-11.028,8.972-20,20-20c11.028,0,20,8.972,20,20C52,43.028,43.028,52,32,52z" />
                    <path fill="#007AFF" d="M41,25c-3.859,0-7,3.14-7,7c0,3.86,3.141,7,7,7c3.859,0,7-3.14,7-7C48,28.14,44.859,25,41,25z M41,35  c-1.654,0-3-1.346-3-3s1.346-3,3-3s3,1.346,3,3S42.654,35,41,35z" />
                    <path fill="#007AFF" d="M23,25c-3.86,0-7,3.14-7,7c0,3.86,3.14,7,7,7c3.86,0,7-3.14,7-7C30,28.14,26.86,25,23,25z M23,35  c-1.654,0-3-1.346-3-3s1.346-3,3-3s3,1.346,3,3S24.654,35,23,35z" />
                </svg>
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