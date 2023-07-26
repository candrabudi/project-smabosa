@section('style')
<style>
    .collaboration {
        width: 100%;
        height: 300px;
        background-color: #375bcd;
        border-bottom: 15px solid #fff000;
    }

    .collaboration .container-collaboration {
        width: 80%;
        height: 100%;
        margin: auto;
        padding: 20px;
        box-sizing: border-box;
    }

    .collaboration .container-collaboration .collaboration-title {
        text-align: center;
        width: 35%;
        margin: auto;

    }

    .collaboration .container-collaboration .collaboration-title h2 {
        color: #375bcd;
        padding: 10px;
        box-sizing: border-box;
        background-color: #fff000;
        border-radius: 4px;
    }

    .collaboration .container-collaboration .content-collaboration {
        padding: 20px;
        box-sizing: border-box;
        margin-top: 15px;
    }

    .collaboration .container-collaboration .content-collaboration .box-program-reguler {
        line-height: 300px !important;
        text-align: center;
        width: 100%;
        min-height: 40px;
        background-color: #fff000;
        margin-top: 50px;
        border-radius: 4px;
    }

    .box-program-reguler h3 {
        color: #375bcd;
    }

    .collaboration .container-collaboration .content-collaboration .box-program-ais {
        line-height: 300px !important;
        text-align: center;
        width: 100%;
        min-height: 40px;
        background-color: #fff000;
        margin-top: 30px;
        border-radius: 4px;
    }

    .box-program-ais h3 {
        color: #375bcd;
    }

    .collaboration .container-collaboration .content-collaboration img {
        width: 100px;
    }

</style>
@endsection
<section class="collaboration">
    <div class="container-collaboration">
        <div class="collaboration-title">
            <h2>PROGRAM AKADEMIK</h2>
        </div>
        <div class="content-collaboration">
            <div class="row">
                <div class="col-md">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="box-program-reguler">
                                <h3>PROGRAM REGULER</h3>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <img src="{{ asset('backend/img/logo/logo-bosa.png')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="box-program-ais">
                                <h3>BOSA-AIS<br> EDUCATIONAL PROGRAM</h3>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <img src="{{ asset('backend/img/logo/logo-bosa-ais.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>