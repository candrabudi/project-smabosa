<div>
    <livewire:layout.header/>
    <section class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="about-left">
                        <div class="about-title align-left">
                            <span class="wow fadeInDown" data-wow-delay=".2s">Tentang Smabosa</span>
                            <h2 class="wow fadeInUp" data-wow-delay=".4s">{{$about->title}}</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo $about->content ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="about-right wow fadeInRight" data-wow-delay=".4s">
                        <img src="{{ !empty($about) ? asset('images_upload/'.$about->thumbnail) : 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg' }}" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="faq section">
        <div class=container>
            <div class="align-center mb-5">
                <span class="wow fadeInDown" data-wow-delay=".2s">Visi & Misi</span>
                <h4 class="wow fadeInUp" data-wow-delay=".4s">Visi & Misi SMA BOPKRI 1 YOGYAKARTA</h4>
            </div>
            <div class=row>
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class=tab-content id=nav-tabContent>
                        <div class="tab-pane fade show active" id=nav-general role=tabpanel>
                            <div class=accordion id=accordionExample>
                                <div class="accordion-item wow fadeInUp" data-wow-delay=".6s">
                                    <h2 class=accordion-header id=headingOne1>
                                        <button class=accordion-button type=button data-bs-toggle=collapse data-bs-target="#collapseOne1" aria-expanded=true aria-controls=collapseOne1>
                                            <span>VISI SMA BOPKRI 1 YOGYAKARTA</span><i class="lni lni-chevron-down"></i>
                                        </button>
                                    </h2>
                                    <div id=collapseOne1 class="accordion-collapse collapse show" aria-labelledby=headingOne1 data-bs-parent="#accordionExample">
                                        <div class=accordion-body>
                                            <p>Terwujudnya manusia cerdas, berbudaya berdaya saing global berdasarkan kasih, integritas dan pelayanan yang tulus</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item wow fadeInUp" data-wow-delay=".8s">
                                    <h2 class=accordion-header id=headingTwo2>
                                        <button class="accordion-button" type=button data-bs-toggle=collapse data-bs-target="#collapseTwo2" aria-expanded=false aria-controls=collapseTwo2>
                                            <span>MISI SMA BOPKRI 1 YOGYAKARTA</span><i class="lni lni-chevron-down"></i>
                                        </button>
                                    </h2>
                                    <div id=collapseTwo2 class="accordion-collapse collapse show" aria-labelledby=headingTwo2 data-bs-parent="#accordionExample">
                                        <div class=accordion-body>
                                            <ul>
                                                <li>Menyelenggarakan pendidikan menengah atas yang sesuai perkembangan zaman dengan dasar kasih, integritas dan pelayanan yang tulus untuk mengembangkan karakter yang berbudaya, berpotensi akademik dan non akademik, serta berdaya saing nasional dan internasional.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <livewire:layout.footer/>
</div>