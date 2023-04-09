<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Informasi Kelulusan SMK Negeri 3 Banjar</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="/userassets/img/favicon.png" rel="icon" />
    <link href="/userassets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="/userassets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/userassets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="/userassets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="/userassets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="/userassets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="/userassets/css/style.css" rel="stylesheet" />

    <!-- =======================================================
  * Template Name: Butterfly
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/butterfly-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo"><img src="/userassets/img/logo.png" alt="Logo SMK Negeri 3 Banjar"
                    title="SMK Negeri 3 Banjar" class="img-fluid" /></a>
            <!-- Uncomment below if you prefer to use text as a logo -->
            <!-- <h1 class="logo"><a href="index.html">Butterfly</a></h1> -->

            <nav id="navbar" class="navbar">

            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h2>
                        Silahkan masukkan NISN (Nomor Induk Siswa Nasional) untuk mengecek informasi
                    </h2>
                    <div class="form-group mt-3">
                        @csrf
                        <input type="text" name="textNisn" id="textNisn" class="form-control"
                            placeholder="Ex : 2021.19.00.000">
                    </div>
                    <div>
                        <button href="#about" class="tombol-cek" id="tombol-check"> <i class="bi-search"></i> Cari</button>
                    </div>
                    <div id="getDataDownload">
                        <!-- Tempat Menyimpan hasil data pencarian untuk mendownload Surat Kelulusan -->
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="/userassets/img/hero-img.png" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>SMK N 3 Banjar</h3>
                        <p>
                            A108 Adam Street <br />
                            New York, NY 535022<br />
                            United States <br /><br />
                            <strong>Phone:</strong> +1 5589 55488 55<br />
                            <strong>Email:</strong> info@example.com<br />
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">

                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">

                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Sosial Media Kami</h4>
                        <p>
                            Di bawah ini merupakan link sosial media kami
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi-instagram"></i></a>
                            <a href="#"><i class="bi-youtube"></i></a>
                        </div>
                        <input type="hidden" name="baseU" id="baseU" value="{{ url('') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright"> &copy; Copyright <strong><span>OmenSoft</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/butterfly-free-bootstrap-theme/ -->
                Designed & template by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/userassets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/userassets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/userassets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/userassets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/userassets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/userassets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/userassets/js/main.js"></script>
    <script src="/adminassets/js/jquery.min.js"></script>
</body>
<script type="text/javascript">
    let baseU = $('#baseU').val()
    console.log(baseU)
    $('#tombol-check').on('click', function(){
        let textNisn = $('#textNisn').val()
        if(textNisn == ""){
            $('#getDataDownload').html('<h3 class="text-danger mt-3">Anda belum menuliskan NISN</h3>')
        }else {
            $.ajax({
            url: baseU +'/cekData',
            type: 'POST',
            dataType: 'JSON',
            data: {
                _token: $('input[name="_token"]').val(),
                nisn: $('#textNisn').val()
            },
            success: function(res){
                console.log(res)
                if(res.statusCode == 404){
                    $('#getDataDownload').html('<h3 class="text-danger mt-3">Data yang anda cari tidak ditemukan.!</h3>')
                }
                if(res.statusCode == 200){
                    $('#getDataDownload').html(`
                        <div class="row">
                            <table class="table table-responsive">
                                <tr>
                                    <td>NISN</td><td><div id="nisnAnda">${res.data.nisn}</div></td>
                                </tr>
                                <tr>
                                    <td>Nama</td><td><div id="namaAnda">${res.data.namasiswa}</div></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><a href="{{ asset('surat-lulus/${res.data.suratlulus}') }}" class="btn btn-sm btn-outline-primary" download><i class="bi bi-download"></i> Download Surat Keterangan</a></td>
                                </tr>
                            </table>
                        </div>
                    `)
                }
                if(res.statusCode == 500){
                    console.log('Errors')
                }
            }
        })
        }

    })
</script>
</html>
