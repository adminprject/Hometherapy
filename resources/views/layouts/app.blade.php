<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> @yield('title') </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('img/logo3.ico') }}" rel="icon">
  <link href="{{ url('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('plugins/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ url('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('plugins/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('plugins/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('plugins/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ url('plugins/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('css/style.css') }}" rel="stylesheet">
  @yield('styles')
</head>

<body>

  <!-- ======= Top Bar ======= -->
  @section('title')
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">info@hometherapy.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+57 350 3542148</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="youtube"><i class="bi bi-youtube"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="cart-plus"><i class="bi-cart-plus"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <img src="{{ url('img/logo6.png') }}">  
      <h1 class="logo"><a href="{{ url('/')}}">Hometherapy Cali<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="{{ url('') }}/"img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{ url('/#hero') }}">Inicio</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/#about') }}">Nosotros</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/#services') }}">Servicios</a></li>
          <li><a class="nav-link scrollto " href="{{ url('/#products') }}">Productos</a></li>
          <li><a class="nav-link scrollto" href="{{ url('/#team') }}">Equipo</a></li>
          <li class="dropdown"><a href="#"><span>Paginas</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ url('foro') }}">Foro</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="{{ url('/#contact') }}">Contáctanos</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  @show
  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Hometherapy Cali<span>.</span></h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Teléfono:</strong> +57 350 3542148<br>
              <strong>Correo:</strong> info@hometherapy.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Enlaces utiles</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Inicio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Nosotros</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Servicios</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Productos</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Equipo</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nuestros servicios</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Fisioterapia deportiva</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Nutrición y dietética</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Hidroterapia</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Salud laboral</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Tratamiento online</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nuestras redes sociales</h4>
            <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Hometherapy Cali</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="http://hometherapy.test/">Hometherapy</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('plugins/aos/aos.js') }}"></script>
  <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('plugins/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ url('plugins/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ url('plugins/php-email-form/validate.js') }}"></script>
  <script src="{{ url('plugins/purecounter/purecounter.js') }}"></script>
  <script src="{{ url('plugins/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ url('plugins/waypoints/noframework.waypoints.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('js/main.js') }}"></script>
@yield('scripts')
</body>

</html>