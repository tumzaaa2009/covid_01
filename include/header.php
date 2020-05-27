<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Covid-19</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Covid-19" name="keywords">
        <meta content="no-mosquitoes" name="description">
        <meta name="msapplication-TileColor" content="#1de099">
        <meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#1de099">

        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
        <link rel="manifest" href="img/favicon/manifest.json">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- DataTables CSS -->
        <link href="lib/datatables-plugins/integration/bootstrap/4/responsive.bootstrap4.min.css" rel="stylesheet">
        <link href="lib/datatables-plugins/integration/bootstrap/4/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- toastr CSS -->
        <link href="lib/toastr/build/toastr.min.css" rel="stylesheet">
        <!-- confirm -->
        <link rel="stylesheet" href="lib/confirm/jquery-confirm.min.css">
        <!-- slick -->
        <link rel="stylesheet" type="text/css" href="lib/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css"/>
        <!--select2-->
        <link href="lib/select2/select2.min.css" rel="stylesheet" />
        <link href="lib/select2/select2-bootstrap.css" rel="stylesheet" />
        <!-- Libraries CSS Files -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="lib/fontawesome/css/all.min.css">
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-now.css" rel="stylesheet">

        <!-- =======================================================
            Theme Name: Avilon
            Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
            Author: BootstrapMade.com
            License: https://bootstrapmade.com/license/
        ======================================================= -->
    </head>

    <body>
        <!--==========================
            Header
        ============================-->
        <header id="header">
            <div class="container">
                <div id="logo" class="pull-left">
                <h1><a href="index.php" class="scrollto"><img src="img/lomo.png" alt="homepage" class="light-logo" style="max-width: 45px;height: 45px;" /></a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <? if($_SESSION['valid_covid_user'] != ""){ ?>
                        <li><a href="javascript:void(0)" class="disabled"><i class="fas fa-user-md"></i> คุณ <? echo $_SESSION['valid_covid_first'];?> <? echo $_SESSION['valid_covid_last']; ?></a></li>
                        <? } ?>

                        <li><a href="index.php"><i class="fab fa-flipboard"></i> หน้าแรก</a></li>
                        <!--<li><a href="media-main.php"><i class="fas fa-clipboard-list"></i> สื่อและข้อปฏิบัติ</a></li>-->
                        <li><a href="report-show.php"><i class="fas fa-paste"></i> ข่าวประชาสัมพันธ์</a></li>
                        <li><a href="view-slide.php"><i class="fas fa-paste"></i> สถานการณ์ใน จ.สระบุรี</a></li>
                        <? if($_SESSION['valid_covid_user'] != ""){ ?>
                        <li class="menu-has-children"><a href="">จัดการข้อมูล</a>
                            <ul>
                                <li><a href="index-slide.php"><i class="fas fa-file-image"></i> จัดการสถานการณ์โรค</a></li>
                                <li><a href="report-main.php"><i class="fas fa-file-download"></i> จัดการข่าวประชาสัมพันธ์</a></li>
                                <li><a href="index-map.php"><i class="fas fa-map"></i> จัดการแผนที่การระบาด</a></li>
                            </ul>
                        </li>
                        <? } ?>

                        <? if($_SESSION['valid_covid_user'] != ""){ ?>
                            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        <? } else {?>
                            <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                        <? }?>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </header><!-- #header -->

        <!--==========================
            Intro Section
        ============================-->
        <section id="intro">
            <div class="intro-text">
                <h2>การเฝ้าระวังโรคโควิด 19 (COVID-19)</h2>
                <p>จังหวัดสระบุรี ปี 2563 <br> สอบถามเพิ่มเติมโทร 1669. หรือ 1422.</p>
            </div>

            <div class="product-screens">
                <div class="wow fadeInUp" data-wow-duration="0.6s">

                </div>
            </div>
        </section><!-- #intro -->