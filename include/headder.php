<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ninestars Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
   <!-- FONT AWESOME -->
   <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="lib/fontawesome/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont .min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

<!-- Confrim css -->
  <link href="lib/confirm/jquery-confirm.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
<!-- toastr -->
 <link href="lib/toastr/build/toastr.min.css" rel="stylesheet">
 
<link href="assets/css/style_tum.css" rel="stylesheet">
   <link href="css/style-now.css" rel="stylesheet">
<!-- DataTable css -->
<link rel="stylesheet" type="text/css" href="lib/datatables/media/css/jquery.dataTables.min.css">

<!-- Chart.js -->
<link rel="stylesheet" href="lib/chart.js/Chart.css">
  <!-- =======================================================
  * Template Name: Ninestars - v2.0.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style type="text/css" media="screen">
  #hero{
    height: 50%;
  }
</style>
<body>
 <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex">

      <div class="logo mr-auto">
        <h3 class="text-primary"><a href="index.php" class="scrollto"><img src="img/lomo.png" alt="homepage" class="light-logo" style="max-width: 45px;height: 45px;" /></a>RH4</h3>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
      <ul>

          <li class="active"><a href="index.php">หน้าแรก</a></li>
          <li><a href="#about">ข่าวประชาสัมพันธ์</a></li>
          <li><a href="#covid-19">รายงาน Covid-19</a></li>
          <li><a href="#covid-19">ข้อมูลยาและเวชภัณฑ์</a></li>
          <li><a href="#covid-19">ข้อมูลครุภัณ</a></li>
     
     
 <? if($_SESSION['valid_covid_user'] != ""){ ?>
          <li class="drop-down"><a href="#">จัดการข้อมูล</a>
            <ul>
              <li><a href="#">จัดการข่าวประชาสัมพันธ์</a></li>
              <li><a href="../covid_r4/index_covit.php">จัดการรายงาน COVID-19</a></li>

              <li><a href="../covid_r4/index_medecine.php">จัดการข้อมูลยาและเวชภัณฑ์</a></li>
              <li><a href="../covid_r4/index_inventory.php">จัดการข้อมูลตึก และ ครุภัณฑ์</a></li>
            </ul>
          </li>
<?php }?>    <? if($_SESSION['valid_covid_user'] != ""){ ?>
                                    <li><a href="logout.php"><i class="fas fa-door-open"></i> Logout </a></li>
                        <? } else {?>
                                     <li><a href="login.php"><i class="fas fa-door-open"></i> Login </a></li>
                        <? }?>
  

         <!--  <li class="get-started"><a href="#about">Get Started</a></li> -->
       </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" >

    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-sm-10 pt-5 pt-lg-0 order-2 order-lg-1">
          <h1>การเฝ้าระวังโรคโควิด 19 (COVID-19)</h1>
          <h2>We are team of talanted designers making websites with Bootstrap</h2>
        
        </div>
        <div class="col-lg-2 col-sm-10 order-1 order-lg-2 hero-img">
          <img src="img/favicon/apple-icon-114x114.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

</body>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- Chart.js -->
  <script src="lib/chart.js/Chart.js"></script>
</html>

