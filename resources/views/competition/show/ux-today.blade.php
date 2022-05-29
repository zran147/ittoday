<x-guest-layout>
    @push('style')
        <link rel="stylesheet" href="/competition/uxtoday.css">
    @endpush
    @php
        if($compe->start_registrasi_competition > Carbon::now()->format('Y-m-d') || $compe->finish_registrasi_competition < Carbon::now()->format('Y-m-d')){
            $index = "#";
        }
        elseif ($compe->start_registrasi_competition == Carbon::now()->format('Y-m-d') || $compe->finish_registrasi_competition == Carbon::now()->format('Y-m-d') || $compe->start_registrasi_competition < Carbon::now()->format('Y-m-d') && $compe->finish_registrasi_competition > Carbon::now()->format('Y-m-d')){
            $index = "/competitions/detail/".$compe->slug_competition."/regis";
        }else{
            $index = "#";
        }
    @endphp
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container blob">
          <div class="row">
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
              <img src="/img/competition/UXToday.png" class="img-fluid animated" alt="">
            </div>
            <div class="col-lg-6 d-flex flex-column justify-content-center">
              <h1 data-aos="fade-up">IT Today 2022</h1>
              <p data-aos="fade-up">UX Today</p>
              <h2 data-aos="fade-up" data-aos-delay="400">UX Today adalah kompetisi desain pengalaman pengguna yang mengutamakan kenyamanan, kepuasan, dan efisiensi. UX Today dapat diikuti oleh seluruh mahasiswa perguruan tinggi di Indonesia. Setiap tim wajib terdiri dari 1-3 orang yang berasal dari universitas/institut yang sama.</h2>
              <h3 data-aos="fade-up" data-aos-delay="500"> Biaya Pendaftaran:</h3>
              <h2 data-aos="fade-up" data-aos-delay="500"> Batch 1 : Rp90.000</h2>
              <h2 data-aos="fade-up" data-aos-delay="500"> Batch 2 : Rp120.000</h2>
              <div data-aos="fade-up" data-aos-delay="600">
              <div data-aos="fade-up" data-aos-delay="600">
                <div class="text-center text-lg-start">
                    <a href="{{ $index }}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                      <span>Register Your Team</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="https://ipb.link/rulebook-uxtoday" class="btn-rule-book scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                      <span>Rule Book</span>
                      <i class="bi bi-arrow-right"></i>
                    </a>
                  </div>
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
        <li class='swiper-pagination-switch first active'><span class='switch-title' style="text-align:center;">1-30 Jun</span></li>
        <li class='swiper-pagination-switch'><span class='switch-title'>1-31 jul</span></li>
        <li class='swiper-pagination-switch'><span class='switch-title'>14-21 Ags</span></li>
        <li class='swiper-pagination-switch'><span class='switch-title'>4 Sep</span></li>
        <li class='swiper-pagination-switch'><span class='switch-title'>11 Sep</span></li>
        <li class='swiper-pagination-switch last'><span class='switch-title'>18 Sep</span></li>
      </ul>
      <!-- Progressbar -->
      <div class="tlswipe-pagination swiper-pagination-progressbar swiper-pagination-horizontal"></div>
      <!-- Swiper -->
      <div class="tlswipe swiper-container swiper-container--timeline">
        <div class="swiper-wrapper">
          <!-- Slides -->
          <div class="swiper-slide"><span class="title">Pendaftaran Batch 1</span></div>
          <div class="swiper-slide"><span class="title">Pendaftaran Batch 2</span></div>
          <div class="swiper-slide"><span class="title">Pengumpulan proposal & video</span></div>
          <div class="swiper-slide"><span class="title">Pengumuman Finalis & Best Video Candidate</span></div>1
          <div class="swiper-slide"><span class="title">Final</span></div>
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
            <div class="box box_1">
              <h3 style="font-size: 40px;">Juara 1</h3>
              <p >Rp5.000.000 + Sertifikat</p>
            </div>
          </div>

          <div class="col-md-6 gap" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <h3>Juara 2</h3>
              <p>Rp3.000.000 + Sertifikat</p>
            </div>
          </div>

          <div class="col-md-6 gap" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <h3>Juara 3</h3>
              <p>Rp1.500.000 + Sertifikat</p>
            </div>
          </div>

          <div class="col-md-6 gap" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <h3>Best Video</h3>
              <p>Rp500.000 + Sertifikat</p>
            </div>
          </div>

        </div>

    </div>
    </div>
    </section>

    <section id="clients" class="clients">

        <div class="container" data-aos="fade-up">

          <header class="section-header">
            <h2>Our Sponsors</h2>
            <p>Calling all sponsors and media partners</p>
          </header>

          <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

      </section>

</x-guest-layout>
