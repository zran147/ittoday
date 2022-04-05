<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>COMPETITION/Form</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Template Main CSS File -->
  <link href="/coba/assets/css/styleform.css" rel="stylesheet">
  @livewireStyles
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="../ittude22pix/index.html" class="logo d-flex align-items-center">
        <img src="/coba/assets\gambar\logoIT_2022putih.png" alt="">
        <span></span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="../ittude22pix/index.html">Home</a></li>
          <li class="dropdown"><a href="#"><span>Events</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">International Seminar</a></li>
              <li><a href="#">Ilkommunity</a></li>
              <li><a href="#">Workshop</a></li>

            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Competitions</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="indexhack.html">Hack Today</a></li>
              <li><a href="#">UX Today</a></li>
              <li><a href="#">Poster Competition</a></li>

            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Sponsor</a></li>
          <li><a class="nav-link scrollto" href="#contact">About</a></li>
          <li><a class="getstarted scrollto" href="#contact">Sign Up</a></li>
          <li><a class="getstarted scrollto" href="#about">Register</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

      <div class="container my-4" data-aos="fade-up">

        <header class="section-header">
          <h2>Hack Today</h2>
          <p>Register Your Team</p>
        </header>
          @livewire('registranttimcompetition.form-registrant-competition',['action' => 'store', 'codeuniqteam' => null])
      </div>

    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>IT TODAY 2022</h3>
            <p>
              Departemen <br>
              Ilmu Komputer<br>
              IPB University <br><br>
              <strong>Phone:</strong> +123 4567 8910 111 (Anonim)<br>
              <strong>Email:</strong> ittoday@apps.ipb.ac.id (?)<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Event</h4>
            <ul>
              <li><i class="bi bi-chevron-compact-right"></i> <a href="#">Event 1</a></li>
              <li><i class="bi bi-chevron-compact-right"></i> <a href="#">Event 2</a></li>
              <li><i class="bi bi-chevron-compact-right"></i> <a href="#">Event 3</a></li>
              <li><i class="bi bi-chevron-compact-right"></i> <a href="#">Event 4</a></li>
              <li><i class="bi bi-chevron-compact-right"></i> <a href="#">Event 5</a></li>
              <li><i class="bi bi-chevron-compact-right"></i> <a href="#">Event 6</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Kompetisi</h4>
            <ul>
              <li><i class="bi bi-chevron-compact-right"></i> <a href="#">Kompetisi 1</a></li>
              <li><i class="bi bi-chevron-compact-right"></i> <a href="#">Kompetisi 2</a></li>
              <li><i class="bi bi-chevron-compact-right"></i> <a href="#">Kompetisi 3</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Social Networks</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="line"><i class="bi bi-line"></i></a>
              <a href="#" class="youtube"><i class="bi bi-youtube"></i></a>
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
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Nah, yg atas ni maksudnya link aja kan yak (yg designed by), yg di copyright atas bole diapus berarti?-->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Optional JavaScript; choose one of the two! -->
  @livewireScripts

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
