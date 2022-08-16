<x-guest-layout>

    @include('components/mainhero')

    <!-- ======= Event Section ======= -->

  <div class="blob">
    <section id="event" class="event">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Events</h2>
          </div>
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row justify-content-center">
                  <div class="col-md-auto d-flex justify-content-center align-items-center">
                      <img src="/img/carousel/Seminar_Nasional.png" alt="Seminar Nasional" style="width: 100%;">
                  </div>
                  <div class="col col-sm-6">
                    <div class="m-1">
                      <h3>1. Seminar Nasional</h3>
                      <p>Acara ini adalah seminar bertaraf nasional yang terdiri dari tiga sesi dengan tiga pembicara yang ahli dalam bidangnya. Dalam rangkaian ini, berbagai topik menarik terkait pentingnya meningkatkan kemampuan terkait IT akan dibahas untuk menghadapi era post-pandemic. Dalam rangkaian acara ini, interaksi antara pembicara dengan peserta seminar yang diestimasi sebanyak 400 peserta dari penjuru Indonesia dimungkinkan.</p>
                      <!-- <a href="#" class="btn-learn-more">Learn More</a> -->
                      <a href="/event" class="btn-learn-more">Learn More</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row justify-content-center workshop">
                    <div class="col-md-auto d-flex justify-content-center align-items-center">
                        <img src="/img/carousel/Workshop.png" alt="Workshop" style="width: 100%;">
                    </div>
                  <div class="col col-sm-6">
                    <div class="m-1">
                      <h3>2. Workshop</h3>
                      <p>Merupakan Workshop sebagai sarana pelatihan dalam bidang IT. Memungkinkan peserta berinteraksi kepada pemateri terkait topik Workshop selama kegiatan berlangsung. Kegiatan ini memberikan pelatihan singkat dengan estimasi 50 peserta.</p>
                      <a href="/event" class="btn-learn-more">Learn More</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row justify-content-center semkom">
                    <div class="col-md-auto d-flex justify-content-center align-items-center">
                      <img src="/img/carousel/Seminar_Komunitas.png" alt="Seminar Komunitas" style="width: 100%;">
                    </div>
                  <div class="col col-sm-6">
                    <div class="m-1">
                      <h3>3. Seminar Komunitas</h3>
                      <p>Merupakan rangkaian seminar bertaraf nasional yang akan diisi oleh komunitas-komunitas dari Departemen Ilmu Komputer dengan mengundang pembicara yang ahli di bidangnya. Seminar ini memungkinkan peserta melakukan interaksi aktif bersama bicara terkait topik-topik menarik mengenai IT.</p>
                      <a href="/event" class="btn-learn-more">Learn More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
              </div>
          </div>
        </div>
      </section>
    <!-- End Event Section -->

    <!-- ======= Kompetisi Asked Questions Section ======= -->
    <section id="kompetisi" class="kompet">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Competitions</h2>
          </div>

          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-aos="fade-up">
            <div class="carousel-inner">
              <div class="carousel-item active">
                  <div class="row justify-content-center">
                    <div class="mobile-kompet col-md-auto d-flex justify-content-center align-items-center">
                      <img src="/img/carousel/Hack_Today.png" alt="Hack Today" style="width: 100%;">
                    </div>
                    <div class="col col-sm-6">
                      <div class="m-3">
                        <h3><span>1. Hack Today</span></h3>
                        <p><span>Merupakan kompetisi keamanan siber dengan mekanisme Capture The Flag (Jeopardy style) yang setiap tim diminta untuk menyelesaikan beberapa kasus dari berbagai kategori dengan tujuan mendapatkan sebuah flag untuk tiap kasusnya. Hack Today dapat diikuti oleh siswa SLTA/sederajat atau mahasiswa perguruan tinggi di seluruh Indonesia. Setiap tim wajib terdiri dari 1-3 orang yang berasal dari lembaga/institusi yang sama.</span></p>
                        <a href="/competitions" class="btn-learn-more">Learn More</a>
                      </div>
                    </div>
                  </div>
                </div>
              <div class="carousel-item">
                <div class="row justify-content-center">
                  <div class="mobile-kompet col-md-auto d-flex justify-content-center align-items-center">
                    <img src="/img/carousel/UX_Today.png" alt="UX Today" style="width: 100%;">
                  </div>
                  <div class="col col-sm-6">
                    <div class="m-3">
                      <h3><span>2. UX Today</span></h3>
                      <p><span>Merupakan kompetisi desain pengalaman pengguna yang mengutamakan kenyamanan, kepuasan, dan efisiensi. UX Today dapat diikuti oleh seluruh mahasiswa perguruan tinggi di Indonesia. Setiap tim wajib terdiri dari 1-3 orang yang berasal dari universitas/institut yang sama.</span></p>
                      <a href="/competitions" class="btn-learn-more">Learn More</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row justify-content-center">
                  <div class="mobile-kompet col-md-auto d-flex justify-content-center align-items-center">
                    <img src="/img/carousel/Poster_Competition.png" alt="Poster Competition" style="width: 100%;">
                  </div>
                  <div class="col col-sm-6">
                    <div class="m-3">
                      <h3><span>3. Poster Competition</span></h3>
                      <p><span>Kompetisi desain poster yang mengutamakan isi, visual, dan orisinalitas karya. Poster Competition dapat diikuti oleh masyarakat umum di seluruh Indonesia. Poster Competition mewadahi masyarakat yang memiliki ide dan krativitas untuk menyampaikannya melalui media poster.</span></p>
                      <a href="/competitions" class="btn-learn-more">Learn More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
          </div>


        </div>
      </section>
    <!--Sponsor Section-->
    <!-- ======= Main Sponsor Section ======= -->
    <section id="mainspo">
        <div  class="clients">
          <div class="section-title">
            <h2>Sponsor</h2>
          </div>

          <div class="group" data-aos="flip-left">
            <h2>Calling All Sponsors and Media Partners</h2>
          </div>
        </div>
      <!-- End Main Sponsor Section -->
        <!-- ======= Spons Section ======= -->
        <div class="spons Exlarge"> <!-- 2 per-row -->
        </div>
        <div class="spons Large"> <!-- 3 per-row -->
          <div class="container justify-content-center">
            <div class="wrap justify-content-center" data-aos="zoom-in">
              <div class="col align-items-center justify-content-center" data-aos="zoom-in">
                <img src="img/Sponsor/[LARGE]-dewaweb.png" class="img-fluid" alt="Dewaweb" style="max-width: 100%;">
              </div>
              <div class="col align-items-center justify-content-center" data-aos="zoom-in">
                <img src="img/Sponsor/[LARGE]-TOYOTA.png" class="img-fluid" alt="Toyota" style="max-width: 100%;">
              </div>
            </div>

          </div>
        </div>
        <div class="spons Standard my-3"> <!-- 4 per-row -->
          <div class="container justify-content-center">

            <div class="wrap justify-content-center" data-aos="zoom-in">

              <div class="col align-items-center justify-content-center" data-aos="zoom-in">
                <img src="img/Sponsor/[STANDARD]-Tokocrypto.png" class="img-fluid" alt="Tokocrypto" style="max-width: 100%;">
              </div>

            </div>

          </div>
        </div>
        <div class="spons small">  <!-- 6 per-row -->
          <div class="container justify-content-center">
            <div class="wrap justify-content-center">

            </div>
          </div>
        </div>
        <!--End Sponsor Section-->
      </section>

    <!-- ======= About us Section ======= -->
    <section id="aboutus" class="aboutus">
        <div class="container" data-aos="zoom-in">

            <div class="section-title">
                <h2>About Us</h2>
            </div>

            <div class="text-center text-lg-center">
              <h3>IT TODAY 2022</h3>
              <p> IT Today merupakan salah satu megaproker yang diadakan oleh Himpunan Mahasiswa Ilmu Komputer (Himalkom) IPB dan Departemen Ilmu Komputer IPB. Diselenggarakan pertama kali pada tahun 2003, IT Today menjadi acara tahunan yang sudah berlangsung sebanyak 19 kali. IT Today memiliki rangkaian acara berupa seminar komunitas, workshop, kompetisi, dan seminar nasional yang dikemas secara menarik. Tiap tahunnya, IT Today berusaha membawakan tema yang berbeda sesuai dengan kondisi dan kebutuhan pada dunia informasi dan teknologi terbaru.</p>
            </div>

        </div>
      </section><!-- End About us Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        @livewire('contact-form-home-page')
    </section>
</div>
    <!-- End Contact Section -->
</x-guest-layout>
