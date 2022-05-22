<x-guest-layout>

    @push('style')
        <link rel="stylesheet" href="/competition/hacktoday.css">
    @endpush
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container blobhero">
          <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
              <h1 data-aos="fade-up">IT Today 2022</h1>
              <p data-aos="fade-up">HACK TODAY</p>
              <h2 data-aos="fade-up" data-aos-delay="400">Hack Today adalah kompetisi keamanan siber dengan mekanisme Capture The Flag (Jeopardy style) yang setiap tim diminta untuk menyelesaikan beberapa kasus dari berbagai kategori dengan tujuan mendapatkan sebuah flag untuk tiap kasusnya. Hack Today dapat diikuti oleh siswa SLTA/sederajat atau mahasiswa perguruan tinggi di seluruh Indonesia. Setiap tim wajib terdiri dari 1-3 orang yang berasal dari lembaga/institusi yang sama.</h2>
              <div data-aos="fade-up" data-aos-delay="600">
                <div class="text-center text-lg-start">
                    @php
                    if($compe->start_registrasi_competition > Carbon::now()->format('Y-m-d')){
                        $index = "#";
                    }
                    elseif ($compe->start_registrasi_competition < Carbon::now()->format('Y-m-d') && $compe->finish_registrasi_competition > Carbon::now()->format('Y-m-d')){
                        $index = "/competitions/detail/".$compe->slug_competition."/regis";
                    }elseif ($compe->finish_registrasi_competition == Carbon::now()->format('Y-m-d')) {
                        $index = "/competitions/detail/".$compe->slug_competition."/regis";
                    }
                    elseif ($compe->finish_registrasi_competition < Carbon::now()->format('Y-m-d')) {
                        $index = "#";
                    }
                @endphp
                  <a href="{{ $index }}" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                    <span>Register Your Team</span>
                    <i class="bi bi-arrow-right"></i>
                  </a>
                  <a href="{{ $compe->rule_book_competition }}" target="_blank" class="btn-rule-book scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                    <span>Rule Book</span>
                    <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
              <img src="/img/competition/HackToday.png" class="img-fluid animated" alt="">
            </div>
          </div>
        </div>
      </section><!-- End Hero -->
    <!-- ======= Values Section ======= -->
    <section id="values" class="values">
      <div class="blobvalue blobcloud">
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
        <li class='swiper-pagination-switch first active'><span class='switch-title' style="text-align:center;">1 Jun</span></li>
        <li class='swiper-pagination-switch'><span class='switch-title'>31 Jul</span></li>
        <li class='swiper-pagination-switch'><span class='switch-title'>27 Ags</span></li>
        <li class='swiper-pagination-switch'><span class='switch-title'>28 Ags</span></li>
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
          <div class="swiper-slide"><span class="title">Pendaftaran</span></div>
          <div class="swiper-slide"><span class="title">Closing Pendaftaran</span></div>
          <div class="swiper-slide"><span class="title">Warm-Up</span></div>
          <div class="swiper-slide"><span class="title">Penyisihan</span></div>
          <div class="swiper-slide"><span class="title">Pengumuman Finalis</span></div>
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
              <h3 style="font-size: 50px;">Juara 1</h3>
              <p >Rp5.000.000</p>
            </div>
          </div>

          <div class="col-md-6 gap" data-aos="fade-up" data-aos-delay="400">
            <div class="box"
              <h3>Juara 2</h3>
              <p>Rp3.000.000</p>
            </div>
          </div>

          <div class="col-md-6 gap" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <h3>Juara 3</h3>
              <p>Rp1.500.000</p>
            </div>
          </div>

          <div class="col-md-6 gap" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <h3>Honorable</h3>
              <p>Rp500.000</p>
            </div>
          </div>

          <div class="col-md-6 gap" data-aos="fade-up" data-aos-delay="600">
            <div class="box">
              <h3>Subtotal</h3>
              <p>Rp10.000.000</p>
            </div>
          </div>

        </div>

    </div>
      </div>
    </section>
    <!-- End Values Section -->

</x-guest-layout>
