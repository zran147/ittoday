<x-guest-layout>
    @push('style')
        <link href="/profile/profile.css" rel="stylesheet">
    @endpush
    <section id="profile" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title mt-5">
                <x-flash-message></x-flash-message>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card card-custome profilecard" style="background: #202749;">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Profile" class="profile" height="300">

                        <div class="nameProfile text-center">
                            <span>{{ Auth::user()->name }}</span>
                        </div>
                        <div class="card-body-custome">
                            <div class="text-center mt-3" style="color: #F2E5DB; margin-left: 0%;">

                                <span class="konten">
                                    <!-- <span class="nameProfile text-center">John Doe Nomor HP</span> -->
                                    <span class="kontencustomeprofile" style="text-align: left;"><b>Nomor HP</b></th>
                                        <td>&nbsp;</td>
                                        <td>:&nbsp;</td>
                                        <td style="text-align: left;">{{ Auth::user()->wa_user }}</td></span>
                                    <span class="kontencustomeprofile" style="text-align: left;"><b>Email</b></th>
                                        <td>&nbsp;</td>
                                        <td>:&nbsp;</td>
                                        <td style="text-align: left;">{{ Auth::user()->email }}</td></span>
                                </span>
                            </div>
                            <a class="btn_slide text-center text-white a" style="margin-top: 10%;" href="/profile/editprofile">Edit Profile</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custome">
                        <div class="slideshow-container">
                            <h4 class="Headername text-center"><b>Kompetisi</b></h4>
                            <div class="mySlides fade1">
                                <img src="/img/carousel/Hack_Today.png" alt="Profile" class="profile" height="300">
                                <div class="nameact text-center">
                                    <span class="activityname">Hack Today</span>
                                </div>
                                <div class="card-body-custome2">
                                    <span class="konten">
                                        <span class="kontencustome1">3-4 September 2022</span>
                                        <span class="kontencustome1">Topik : Berintegrasi</span>
                                    </span>
                                    <a class="btn_slide text-center" style="margin-bottom: 5px;" style="color: #4884d4;">Daftar Kompetisi</a>
                                </div>
                            </div>

                            <button class="carousel-control-prev1" onclick="plusSlides(-1)" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next1" onclick="plusSlides(1)" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                            <!-- <div class="prev1" >❮</div>
                            <div class="next1" >❯</div> -->
                        </div>

                        <div style="text-align:center" class="mb-3">
                            <span class="dot" onclick="currentSlide(1)"></span>
                            <span class="dot" onclick="currentSlide(2)"></span>
                            <span class="dot" onclick="currentSlide(3)"></span>
                        </div>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-custome">
                        <div class="slideshow-container2">
                            <h4 class="Headername text-center"><b>Webinar</b></h4>
                            <div class="mySlides2 fade2">
                                <img src="/img/carousel/Seminar_Komunitas.png" alt="Profile" class="profile" height="300">
                                <div class="nameact text-center">
                                    <span class="activityname">Seminar Komunitas</span>
                                </div>
                                <div class="card-body-custome2">
                                    <span class="konten">
                                        <span class="kontencustome2">20 Agustus 2022 - 11 September 2022</span>
                                        <span class="kontencustome2">Tema : Berintegrasi</span>
                                        <span class="kontencustome2">Narasumber : Jack HR</span>
                                    </span>
                                    <a class="btn_slide" style="margin-bottom: 5px;" style="color: #4884d4;">Daftar Webinar</a>
                                </div>
                            </div>

                            <button class="carousel-control-prev2" onclick="plusSlides2(-1)" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next2" onclick="plusSlides2(1)" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                        <div style="text-align:center" class="mb-3">
                            <span class="dot2" onclick="currentSlide2(1)"></span>
                            <span class="dot2" onclick="currentSlide2(2)"></span>
                            <span class="dot2" onclick="currentSlide2(3)"></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      </section>
      @push('style')
        <script src="/profile/profile.js"></script>
      @endpush
</x-guest-layout>
