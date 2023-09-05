<div>
    <header class="header navbar-area">
        <div class="toolbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-12">
                        <div class="toolbar-social">
                            <ul>
                                <li><a href="https://twitter.com/SMABOSA_YK?t=WrQON_m8V57uWFSj65bD8w&s=09"><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="https://instagram.com/smabosa?utm_source=qr&igshid=ZDc4ODBmNjlmNQ%3D%3D"><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href="https://youtube.com/@smabopkri1yogyakarta62"><i class="fa-brands fa-youtube"></i></a></li>
                                <li><a href="mailto:smabosa@gmail.com"><i class="fa-brands fa-google"></i></a></li>
                                <li><a href="https://www.tiktok.com/@smabosa?_t=8eIfk94bTAf&_r=1"><i class="fa-brands fa-tiktok"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="toolbar-login">
                            <div class="button">
                                <a href="https://pcpdb.smabosa-yogya.sch.id/register">Register</a>
                                <a href="https://pcpdb.smabosa-yogya.sch.id/" class="btn">Log In</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{route('id.landingpage')}}">
                                <img src="{{ asset('asset_fe/images/logo/logo.webp') }}" 
                                    srcset="{{ asset('asset_fe/images/logo/logo.webp')}} 500w,
                                    {{ asset('asset_fe/images/logo/logo.webp')}} 1000w,
                                    {{ asset('asset_fe/images/logo/logo.webp')}} 1500w" 
                                    sizes="(max-width: 600px) 300px,
                                    (max-width: 1200px) 600px,
                                    1200px"
                                    width="20" 
                                    loading="lazy" 
                                    alt="Logo"
                                >
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{route('id.landingpage')}}" aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <span class="dd-menu collapsed" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Profil</span>
                                        <ul class="sub-menu collapse" id="submenu-1-2">
                                            <li class="nav-item"><a href="{{route('id.about')}}">Tentang Sekolah</a></li>
                                            <li class="nav-item"><a href="{{route('id.teacher')}}">Guru & Karyawan</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('id.event')}}">Agenda</a>
                                    </li>
                                    <li class="nav-item">
                                        <span class="dd-menu collapsed" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Sekolah Kita</sp>
                                        <ul class="sub-menu collapse" id="submenu-1-3">
                                            <li class="nav-item"><a href="{{route('id.announcement')}}">Pengumuman</a></li>
                                            <li class="nav-item"><a href="{{route('id.blog')}}">Blog</a></li>
                                            <li class="nav-item"><a href="https://www.youtube.com/channel/UC1JUQzztEDDSOVOC0rTMY2A">Video</a></li>
                                            <li class="nav-item"><a href="{{route('id.activity')}}">Kegiatan</a></li>
                                            <li class="nav-item"><a href="{{route('id.extracurricular')}}">Ekstrakurikuler</a></li>
                                            <li class="nav-item"><a href="{{route('id.facility')}}">Fasilitas</a></li>
                                            <li class="nav-item"><a href="{{route('id.facility')}}">Opini</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <span class="dd-menu collapsed" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Perpustakaan</span>
                                        <ul class="sub-menu collapse" id="submenu-1-4">
                                            <li class="nav-item"><a href="http://117.102.64.163:3333/perpustakaan">Bosa Jogja Library</a></li>
    
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://smabosa-yogya.sch.id/id/blog/pedoman-dan-pengisian-formulir-pcpdb-sma-bosa-tahun-pelajaran-2023-2024" aria-label="Toggle navigation">PCPDB</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://alumni.smabosa-yogya.sch.id/">Alumni</a>
                                    </li>
                                    <li class="nav-item">
                                        <span class="dd-menu collapsed" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#submenu-1-5" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Lainnya</span>
                                        <ul class="sub-menu mega-menu collapse" id="submenu-1-5">
                                            <li class="single-block">
                                                <ul>
                                                    <li class="mega-menu-title">BKKBN</li>
                                                    <li class="nav-item"><a href="#">PERSADA</a></li>
                                                    <li class="nav-item"><a href="#">KEPENDUDUKAN</a></li>
                                                    <li class="nav-item"><a href="#">MATERI KEPENDUDUKAN</a></li>
                                                </ul>
                                            </li>
                                            <li class="single-block">
                                                <ul>
                                                    <li class="mega-menu-title">SPAB</li>
                                                    <li class="nav-item"><a href="{{route('id.page.spab')}}">KEGIATAN</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <span class="dd-menu collapsed" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#submenu-1-6" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i><img src="https://cdn-icons-png.flaticon.com/512/9985/9985721.png" width="15" style="margin-top: -3px;" alt=""></i> &nbsp;Language</span>
                                        <ul class="sub-menu collapse" id="submenu-1-6">
                                            <li class="nav-item"><a href="/id"><i><img src="https://cdn-icons-png.flaticon.com/512/323/323372.png" width="15" style="margin-top: -3px;" alt=""></i> Indonesia</a></li>
                                            <li class="nav-item"><a href="/en"><i><img src="https://cdn-icons-png.flaticon.com/512/9906/9906532.png" width="15" style="margin-top: -3px;" alt=""></i> English</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>