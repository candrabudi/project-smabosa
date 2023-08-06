<style>
    
</style>
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>

<header class="header navbar-area">

    <div class="toolbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="toolbar-social">
                        <ul>
                            <li><a href="https://twitter.com/SMABOSA_YK?t=WrQON_m8V57uWFSj65bD8w&s=09"><i class="lni lni-twitter-original"></i></a></li>
                            <li><a href="https://instagram.com/smabosa?utm_source=qr&igshid=ZDc4ODBmNjlmNQ%3D%3D"><i class="lni lni-instagram"></i></a></li>
                            <li><a href="https://youtube.com/@smabopkri1yogyakarta62"><i class="lni lni-youtube"></i></a></li>
                            <li><a href="mailto:smabosa@gmail.com"><i class="lni lni-google"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="toolbar-login">
                        <div class="button">
                            <a href="#">Register</a>
                            <a href="#" class="btn">Log In</a>
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
                        <a class="navbar-brand" href="">
                            <img src="{{ asset('asset_fe/images/logo/logo.png') }}" loading="lazy" alt="Logo">
                        </a>
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="/" aria-label="Toggle navigation">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Profil</a>
                                    <ul class="sub-menu collapse" id="submenu-1-2">
                                    <li class="nav-item"><a href="{{route('about')}}">Tentang Sekolah</a></li>
                                        <li class="nav-item"><a href="{{route('teacher')}}">Guru</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('event')}}">Agenda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Sekolah Kita</a>
                                    <ul class="sub-menu collapse" id="submenu-1-3">
                                        <li class="nav-item"><a href="{{route('announcement')}}">Pengumuman</a></li>
                                        <li class="nav-item"><a href="{{route('blog')}}">Blog</a></li>
                                        <li class="nav-item"><a href="https://www.youtube.com/channel/UC1JUQzztEDDSOVOC0rTMY2A">Video</a></li>
                                        <li class="nav-item"><a href="{{route('activity')}}">Kegiatan</a></li>
                                        <li class="nav-item"><a href="{{route('extracurricular')}}">Ekstrakurikuler</a></li>
                                        <li class="nav-item"><a href="{{route('facility')}}">Fasilitas</a></li>
                                        <li class="nav-item"><a href="{{route('facility')}}">Opini</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-4" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Perpustakaan</a>
                                    <ul class="sub-menu collapse" id="submenu-1-4">
                                        <li class="nav-item"><a href="http://117.102.64.163:3333/perpustakaan">Bosa Jogja Library</a></li>

                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="https://smabosa-yogya.sch.id/2022/08/31/pedoman-dan-pengisian-formulir-pcpdb-sma-bosa-tahun-pelajaran-2022-2024/" aria-label="Toggle navigation">PCPDB</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://alumni.smabosa-yogya.sch.id/">Alumni</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-5" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Lainnya</a>
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
                                                <li class="nav-item"><a href="{{route('pageSpab')}}">KEGIATAN</a></li>
                                            </ul>
                                        </li>
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