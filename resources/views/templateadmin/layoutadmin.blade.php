
<!DOCTYPE html>
<html lang="en">

@include('partials.header')

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="/adminassets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Info Lulus SMK</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/adminassets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ auth()->user()->name }}</h6>
              <span>{{ auth()->user()->job }}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <form action="/auth/logout" method="POST">
                    @csrf
                    <button class="dropdown-item d-flex align-items-center" type="submit" >
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </button>
                </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('partials.aside')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>{{ $header }}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">{{ $breadcrumb1 }}</a></li>
          <li class="breadcrumb-item">{{ $breadcrumb2 }}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/adminassets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main JS File -->
  {{-- <script src="/adminassets/js/main.js"></script> --}}
  <script src="/adminassets/js/jquery.min.js"></script>
  <script src="/adminassets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="/adminassets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="/adminassets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="/adminassets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  @stack('addon-js')
</body>

</html>
