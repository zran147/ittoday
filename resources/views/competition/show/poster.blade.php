<x-guest-layout title="POSTER TODAY">
    @push('style')
        <link rel="stylesheet" href="/competition/poster.css">
    @endpush
    @php
        if($compe->start_registrasi_competition > Carbon::now()->format('Y-m-d') || $compe->finish_registrasi_competition < Carbon::now()->format('Y-m-d')){
            $index = "#";
        }
        elseif ($compe->start_registrasi_competition == Carbon::now()->format('Y-m-d') || $compe->finish_registrasi_competition == Carbon::now()->format('Y-m-d') || $compe->start_registrasi_competition < Carbon::now()->format('Y-m-d') && $compe->finish_registrasi_competition > Carbon::now()->format('Y-m-d')){
            $index = "/competitions/detail/".$compe->slug_competition."/regis/poster";
        }else{
            $index = "#";
        }
    @endphp
        <!-- ======= Hero Section ======= -->
        <section id="hero" class="hero d-flex align-items-center">
            <div class="container blob">
              <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                  <h1 data-aos="fade-up">IT Today 2022</h1>
                  <p data-aos="fade-up">POSTER COMPETITION</p>
                  <h2 data-aos="fade-up" data-aos-delay="400">Poster Competition adalah kompetisi desain poster yang mengutamakan isi, visual, dan orisinalitas karya. Poster Competition dapat diikuti oleh masyarakat umum di seluruh Indonesia. Poster Competition mewadahi masyarakat yang memiliki ide dan krativitas untuk menyampaikannya melalui media poster.</h2>
                  <h3 data-aos="fade-up" data-aos-delay="500"> Biaya Pendaftaran: GRATIS</h3>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                  <img src="/img/competition/PosterComp.png" class="img-fluid animated" alt="">

                    <div class="text-center pad_bawah">
                      <a href="{{ $index }}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Register</span>
                        <i class="bi bi-arrow-right"></i>
                      </a>
                      <a href="{{ $compe->rule_book_competition }}" class="btn-rule-book scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                        <span>Rule Book</span>
                        <i class="bi bi-arrow-right"></i>
                      </a>
                    </div>

                </div>

              </div>
            </div>
          </section><!-- End Hero -->
        <!-- ======= Values Section ======= -->
        <section id="values" class="values">
          <div class="blobvalue">
          <div class="container" data-aos="fade-up">

            <header class="section-header flex-d justify-content-center align-items-center">
              <h2>TIMELINE</h2>
              <!--<p>Hack Today</p>-->
            </header>
          </div>

          <div class="container pad_bawah">
          <div class="swiper-container-wrapper swiper-container-wrapper--timeline">
          <!-- Timeline -->
          <ul class="swiper-pagination-custom">
            <li class='swiper-pagination-switch first active'><span class='switch-title' style="text-align:center;">1-31 Jul</span></li>
            <li class='swiper-pagination-switch'><span class='switch-title' style="text-align:center;">1 Jul</span></li>
            <li class='swiper-pagination-switch'><span class='switch-title' style="text-align:center;">14 Ags</span></li>
            <li class='swiper-pagination-switch'><span class='switch-title'>21 Ags</span></li>
            <li class='swiper-pagination-switch'><span class='switch-title'>4 Sep</span></li>
            <li class='swiper-pagination-switch last'><span class='switch-title'>18 Sep</span></li>
          </ul>
          <!-- Progressbar -->
          <div class="tlswipe-pagination swiper-pagination-progressbar swiper-pagination-horizontal"></div>
          <!-- Swiper -->
          <div class="tlswipe swiper-container swiper-container--timeline">
            <div class="swiper-wrapper">
              <!-- Slides -->
              <div class="swiper-slide"><span class="title">Pendaftaran</span></div>
              <div class="swiper-slide"><span class="title">Poster Submission</span></div>
              <div class="swiper-slide"><span class="title">Poster Submission Closed</span></div>
              <div class="swiper-slide"><span class="title">Voting</span></div>
              <div class="swiper-slide"><span class="title">Voting Closed</span></div>
              <div class="swiper-slide"><span class="title">Awarding</span></div>
            </div>
          </div>
        </div>
        </div>
        <div class="container" data-aos="fade-up">

            <header class="section-header d-flex justify-content-center align-items-center">
              <h2>PRIZE POOL</h2>
              <!--<p>Hack Today</p>-->
            </header>

            <div class="row d-flex justify-content-center align-items-center">

              <div class="col-md-10 gap" data-aos="fade-up" data-aos-delay="200">
                <div class="box_1">
                  <h3>Juara 1</h3>
                  <p >Rp700.000 + Sertifikat</p>
                </div>
              </div>

              <div class="col-md-6 gap" data-aos="fade-up" data-aos-delay="400">
                <div class="box ukuranbox">
                  <h3>Juara 2</h3>
                  <p>Rp500.000 + Sertifikat</p>
                </div>
              </div>

              <div class="col-md-6 gap" data-aos="fade-up" data-aos-delay="400">
                <div class="box ukuranbox">
                  <h3>Juara 3</h3>
                  <p>Rp200.000 + Sertifikat</p>
                </div>
              </div>

              <div class="col-md-6 gap" data-aos="fade-up" data-aos-delay="600">
                <div class="box ukuranbox">
                  <h3>Favorite</h3>
                  <p>Rp100.000 + Sertifikat</p>
                </div>
              </div>

            </div>
        </div>
        </div>
        </section>
        <!-- End Values Section -->

        <section id="clients" class="clients">

          <div class="container" data-aos="fade-up">

            <header class="section-header">
              <h2>Our Sponsors</h2>
              <p>Calling all sponsors and media partners</p>
            </header>

            <div class="clients-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

        </section><!-- End Clients Section -->

</x-guest-layout>
