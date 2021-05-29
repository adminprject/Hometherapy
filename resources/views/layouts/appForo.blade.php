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
  <link href="{{ url('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
  <link href="{{ url('plugins/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('plugins/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('plugins/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ url('plugins/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ url('plugins/summernote-0.8.18-dist/summernote-bs4.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ url('css/login.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ url('css/profileuserforo.css') }}">
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
    <div class="container-fluid ">
      <div class="row">
        <div class="col-md-3 col-xl left-column" style="margin-top: 0.9rem;">
          @auth
            <div class="row userMain">
              <div class="col-md">
                <div class="userBlock">
                  <div class="backgrounImg">
                    <img src="{{ url('img/user-profile/fondo-user-profile.jpg') }}">
                  </div>
                  <div class="userImg">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random">
                  </div>
                  <div class="userDescription">
                    <h5>{{ Auth::user()->name }}</h5>
                    <p>{{ Auth::user()->email }}</p>
                    @if(Auth::user()->rol_id == 1)
                      <a href="{{ url('admin/home') }}">
                        <button class="btn">Volver Admin</button>
                      </a>
                    @endif
                    <a href="{{ url('foro/logout') }}">
                      <button class="btn">Cerrar Session</button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endauth
          <div class="row">
            @auth
              @if(Auth::user()->rol_id == 1)
                <div class="col-md">
                  <div class="card" style="margin-left: 0.6rem;">
                    <div class="card-body">
                      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="{{ url('foro/registerDiscusion') }}" role="tab" aria-controls="v-pills-home" aria-selected="true">
                          Nueva Discusion
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            @endauth
            <div class="col-md">
              <div class="card" style="margin-left: 0.6rem; margin-top: 1rem;">
                <div class="card-body">
                  <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a href="{{ url('foro') }}" class="form-control" style="margin-top: 0.5rem;">
                      Todas las Discusiones
                    </a>
                    @foreach($categories as $category)
                    <a href="{{ url('foro') }}/{{ $category->name }}" class="form-control" style="margin-top: 0.5rem; color: {{ $category->color }}">  {{ $category->name }}
                    </a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>  
          </div>
        </div>
        <div class="col-lg-9" style="margin-top: 0.2rem;">
          @yield('content')
        </div>
      </div>
    </div>
      </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
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
  <script src="{{ url('plugins/bootstrap/js/bootstrap.js') }}"></script>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{ url('plugins/summernote-0.8.18-dist/summernote-bs4.js') }}"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('textarea#comment').summernote({
        tabsize: 2,
        height: 160,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    });
</script>
@yield('scripts')
</body>

</html>