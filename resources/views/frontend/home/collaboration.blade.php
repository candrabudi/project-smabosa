@section('style')
<style>
    .mt-10 {
        margin-top: 5rem !important
    }

    .apply-process {
        background-color: #375bcd;
        padding: 60px 0;
        border-bottom: 15px solid #fff000;
    }

    .apply-process .process-item {
        padding-left: 25px;
        position: relative;
        padding-right: 92px;
    }

    .apply-process .process-item img {
        color: #fff;
        position: absolute;
        right: 0;
        top: 0;
        width: 90px;
        text-align: center;
        margin-top: -20px;
    }

    .apply-process .process-item h4 {
        font-size: 20px;
        font-weight: bold;
        color: #2042e3;
        background-color: #fff000;
        position: relative;
        display: block;
        margin-bottom: 20px;
        padding-bottom: 20px;
        line-height: 30px;
        padding: 15px;
        width: 95%;
        text-align: center;
        border-radius: 8px;
    }

    .apply-process h2 {
        font-size: 28px;
        font-weight: bold;
        color: #2042e3;
        background-color: #fff000;
        position: relative;
        display: block;
        line-height: 30px;
        margin: auto;
        padding: 15px;
        width: 88%;
        text-align: center;
        border-radius: 8px;
    }

    .apply-process .process-item p {
        color: #fff;
        width: 80%;
        display: block;
    }
</style>
@endsection
<section class="apply-process section">
    <div class="container">
        <h2>LAYANAN PENDIDIKAN</h2>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 mt-10">
                <div class="process-item">
                    <h4><a href="{{route('schoolprogramRegular')}}">PROGRAM REGULER</a></h4>
                    <img src="{{ asset('asset_be/img/logo/logo-bosa.webp')}}" alt="Logo" loading="lazy">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-10">
                <div class="process-item">
                    <h4><a href="{{route('schoolprogramBosaAis')}}">BOSA-AIS EDUCATIONAL PROGRAM</a></h4>
                    <img src="{{ asset('asset_be/img/logo/logo-bosa-ais.webp')}}" alt="Logo" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>