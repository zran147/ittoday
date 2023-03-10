<!DOCTYPE html>
<html lang="ID">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Develop IT Skills to Face Post-Pandemic Era by Being Aware of Today’s Issues - IT Today 2022" name="description">
    <meta content="ittoday, 2022, Competition, Webinar, Kompetisi, Pendaftaran, Event" name="keywords">
    <title>{{ $title }}  IT TODAY 2022 - Develop IT Skills to Face Post-Pandemic Era by Being Aware of Today’s Issues</title>
    <link rel="manifest" href="/img/logo.png">
    <x-meta-guest/>
    @livewireStyles
    @stack('style')
</head>

<body>
       <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

        <a href="/" class="logo me-auto"><img src="/img/logoIT_2022putih.png" alt="" class="img-fluid"></a>

        <!--Navbar-->
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="/">Home</a></li>
                <li><a href="/event" class=" nav-link scrollto">Events</a></li>
                <li><a href="/competitions" class=" nav-link scrollto">Competitions</a></li>
                <li><a class="nav-link scrollto" href="/#mainspo">Sponsor</a></li>
                <li><a class="nav-link scrollto" href="/#aboutus">About</a></li>
                <li><a class="nav-link scrollto" href="/#contact">Reach Us</a></li>
            @guest
                <li><a class="getstarted scrollto" href="/register">Sign up</a></li>
                @php
                    $text = 'login';
                @endphp
            @endguest

            @auth
                @php
                    $text = 'login';
                        if (Auth::user()->hasPermissionTo('dashboard-menu')) {
                        $text = 'dashboard';
                        } else {
                        $text = 'account';
                        }
                @endphp
            @endauth

            <li>
                <a class="getstarted scrollto" href="/{{ $text }}">{{ ucfirst($text) }}</a>
            </li>
                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="mx-4 getstarted scrollto">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
            <i class="fa-solid fa-bars mobile-nav-toggle"></i>
        </nav>
        </div>
    </header>

    <!-- ======= Hero Section ======= -->
    <main id="main">
        {{ $slot }}
    </main>

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
          <div class="container">
            <div class="row">

              <div class="col-lg-3 col-md-6 footer-contact">
                <h3>IT TODAY 2022</h3>
                <p>
                  Departemen Ilmu Komputer<br>
                  IPB University <br><br>
                  <strong>Contact Person:</strong> 082127794660 (Salma)<br>
                  <strong>Email:</strong> business@ittoday.id<br>
                </p>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Events</h4>
                <ul>
                  <li><i class="bi bi-chevron-compact-right"></i> <a href="/event">Seminar Nasional</a></li>
                  <li><i class="bi bi-chevron-compact-right"></i> <a href="/event">Workshop</a></li>
                  <li><i class="bi bi-chevron-compact-right"></i> <a href="/event">Seminar Komunitas</a></li>
                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Competition</h4>
                <ul>
                  <li><i class="bi bi-chevron-compact-right"></i> <a href="/competitions">Hack Today</a></li>
                  <li><i class="bi bi-chevron-compact-right"></i> <a href="/competitions">UX Today</a></li>
                  <li><i class="bi bi-chevron-compact-right"></i> <a href="/competitions">Poster Competition</a></li>
                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Our Social Networks</h4>
                <p>Follow, add, and subscribe to our social media for further information and update</p>
                <div class="social-links mt-3">
                  <a href="https://twitter.com/ittoday_ipb?s=20&t=U6S1EBbDfGdeTJBPPSvV6A" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="https://www.facebook.com/profile.php?id=100011441992776" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/ittoday_ipb?utm_medium=copy_link" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=ukd0443x" class="line"><i class="bi bi-line"></i></a>
                  <a href="https://www.linkedin.com/in/it-today-462b51188/" class="linkedin"><i class="bi bi-linkedin"></i></a>
                  <a href="https://vt.tiktok.com/ZSdLu5p4c/" class="tiktok"><i class="bi bi-tiktok"></i></a>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="container footer-bottom clearfix">
          <div class="copyright">
            &copy; Copyright <strong><span>IT Today 2022</span></strong> Bogor, Indonesia
          </div>
          <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- /Vendor JS Files -->
    @livewireScripts
    @stack('script')
    <script src="/vendor/aos.js"></script>
    <script src="/vendor/glightbox.min.js"></script>
    <script src="/vendor/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="/js/main.js"></script>
</body>

</html>
