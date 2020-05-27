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

        <!-- Libraries CSS Files -->
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="lib/fontawesome/css/all.min.css">
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
    
        <link href="css/style-now.css" rel="stylesheet">

        <!-- =======================================================
            Theme Name: Avilon
            Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
            Author: BootstrapMade.com
            License: https://bootstrapmade.com/license/
        ======================================================= -->

<style type="text/css" media="screen">
    
body {
  background: #fff;
  color: #666666;
  font-family: "Kanit", sans-serif;
  overflow-x: hidden;
}

a {
  color: #1dc8cd;
  transition: 0.5s;
}

a:hover,
a:active,
a:focus {
  color: #1dc9ce;
  outline: none;
  text-decoration: none;
}

p {
  padding: 0;
  margin: 0 0 30px 0;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Kanit", sans-serif;
  font-weight: 400;
  margin: 0 0 20px 0;
  padding: 0;
}

/* Back to top button */

.back-to-top {
  position: fixed;
  display: none;
  background: linear-gradient(45deg, #1de099, #1dc8cd);
  color: #fff;
  padding: 2px 20px 8px 20px;
  font-size: 16px;
  border-radius: 4px 4px 0 0;
  right: 15px;
  bottom: 0;
  transition: none;
}

.back-to-top:focus {
  background: linear-gradient(45deg, #1de099, #1dc8cd);
  color: #fff;
  outline: none;
}

.back-to-top:hover {
  background: #1dc8cd;
  color: #fff;
}

/* Back to top button */

.back-to-top-2 {
  position: fixed;
  /*display: none;*/
  background: linear-gradient(45deg, #1de099, #1dc8cd);
  color: #fff;
  padding: 2px 20px 8px 20px;
  font-size: 16px;
  border-radius: 4px 4px 0 0;
  right: 75px;
  bottom: 0;
  transition: none;
}

.back-to-top-2:focus {
  background: linear-gradient(45deg, #1de099, #1dc8cd);
  color: #fff;
  outline: none;
}

.back-to-top-2:hover {
  background: #1dc8cd;
  color: #fff;
}

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

#header {
  padding: 30px 0;
  height: 92px;
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  transition: all 0.5s;
  z-index: 997;
}

#header #logo {
  float: left;
}

#header #logo h1 {
  font-size: 36px;
  margin: -4px 0 0 0;
  padding: 0;
  line-height: 1;
  display: inline-block;
  font-family: "Kanit", sans-serif;
  font-weight: 300;
  letter-spacing: 3px;
  text-transform: uppercase;
}

#header #logo h1 a,
#header #logo h1 a:hover {
  color: #fff;
}

#header #logo img {
  padding: 0;
  margin: 0;
}

#header.header-fixed {
  background: linear-gradient(45deg, #1de099, #1dc8cd);
  padding: 20px 0;
  height: 72px;
  transition: all 0.5s;
}

/*--------------------------------------------------------------
# Intro Section
--------------------------------------------------------------*/

#intro {
  width: 100%;
  /*height: 100vh;*/
  height: 250px;
  background: linear-gradient(4deg, rgba(255, 255, 255,0.8), rgba(254, 248, 245,0.8)), url("img/intro-bg.jpg") center top no-repeat;
  background-size: cover;
  position: relative;
}

#intro .intro-text {
  position: absolute;
  left: 0;
  top: 100px;
  right: 0;
  height: calc(50% - 60px);
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
  -ms-flex-pack: center;
  justify-content: center;
  
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
}

#intro h2 {
  margin: 30px 0 10px 0;
  padding: 0 15px;
  font-size: 48px;
  font-weight: 400;
  line-height: 56px;
  color: #1de099;
}

#intro p {
  color: #fff;
  margin-bottom: 20px;
  padding: 0 15px;
  font-size: 24px;
}

#intro .btn-get-started {
  font-family: "Kanit", sans-serif;
  font-weight: 400;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 8px 28px;
  border-radius: 50px;
  transition: 0.5s;
  margin: 10px;
  border: 2px solid #fff;
  color: #fff;
}

#intro .btn-get-started:hover {
  color: #1dc8cd;
  background: #fff;
}

#intro .product-screens {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  overflow: hidden;
  text-align: center;
  width: 100%;
  height: 50%;
}

#intro .product-screens img {
  box-shadow: 0px -2px 19px 4px rgba(0, 0, 0, 0.29);
}

#intro .product-screens .product-screen-1 {
  position: absolute;
  z-index: 30;
  left: calc(50% + 54px);
  bottom: 0;
  top: 30px;
}

#intro .product-screens .product-screen-2 {
  position: absolute;
  z-index: 20;
  left: calc(50% - 154px);
  bottom: 0;
  top: 90px;
}

#intro .product-screens .product-screen-3 {
  position: absolute;
  z-index: 10;
  left: calc(50% - 374px);
  bottom: 0;
  top: 150px;
}

/*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/

/* Nav Menu Essentials */

.nav-menu,
.nav-menu * {
  margin: 0;
  padding: 0;
  list-style: none;
}

.nav-menu ul {
  position: absolute;
  display: none;
  top: 100%;
  left: 0;
  z-index: 99;
}

.nav-menu li {
  position: relative;
  white-space: nowrap;
}

.nav-menu > li {
  float: left;
}

.nav-menu li:hover > ul,
.nav-menu li.sfHover > ul {
  display: block;
}

.nav-menu ul ul {
  top: 0;
  left: 100%;
}

.nav-menu ul li {
  min-width: 180px;
}

/* Nav Menu Arrows */

.sf-arrows .sf-with-ul {
  padding-right: 30px;
}

.sf-arrows .sf-with-ul:after {
  content: "\f107";
  position: absolute;
  right: 15px;
  font-family: FontAwesome;
  font-style: normal;
  font-weight: normal;
}

.sf-arrows ul .sf-with-ul:after {
  content: "\f105";
}

/* Nav Meu Container */

#nav-menu-container {
  float: right;
  margin: 0;
}

/* Nav Meu Styling */

.nav-menu a {
  padding: 0 8px 10px 8px;
  text-decoration: none;
  display: inline-block;
  color: #fff;
  font-family: "Kanit", sans-serif;
  font-weight: 400;
  font-size: 14px;
  outline: none;
}

.nav-menu > li {
  margin-left: 10px;
}

.nav-menu ul {
  margin: 4px 0 0 0;
  padding: 10px;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
  background: #fff;
}

.nav-menu ul li {
  transition: 0.3s;
}

.nav-menu ul li a {
  padding: 10px;
  color: #333;
  transition: 0.3s;
  display: block;
  font-size: 13px;
  text-transform: none;
}

.nav-menu ul li:hover > a {
  color: #1dc8cd;
}

.nav-menu ul ul {
  margin: 0;
}

/* Mobile Nav Toggle */

#mobile-nav-toggle {
  position: fixed;
  right: 0;
  top: 0;
  z-index: 999;
  margin: 20px 20px 0 0;
  border: 0;
  background: none;
  font-size: 24px;
  display: none;
  transition: all 0.4s;
  outline: none;
  cursor: pointer;
}

#mobile-nav-toggle i {
  color: #fff;
}

/* Mobile Nav Styling */

#mobile-nav {
  position: fixed;
  top: 0;
  padding-top: 18px;
  bottom: 0;
  z-index: 998;
  background: rgba(52, 59, 64, 0.9);
  left: -260px;
  width: 260px;
  overflow-y: auto;
  transition: 0.4s;
}

#mobile-nav ul {
  padding: 0;
  margin: 0;
  list-style: none;
}

#mobile-nav ul li {
  position: relative;
}

#mobile-nav ul li a {
  color: #fff;
  font-size: 16px;
  overflow: hidden;
  padding: 10px 22px 10px 15px;
  position: relative;
  text-decoration: none;
  width: 100%;
  display: block;
  outline: none;
}

#mobile-nav ul li a:hover {
  color: #fff;
}

#mobile-nav ul li li {
  padding-left: 30px;
}

#mobile-nav ul .menu-has-children i {
  position: absolute;
  right: 0;
  z-index: 99;
  padding: 15px;
  cursor: pointer;
  color: #fff;
}

#mobile-nav ul .menu-has-children i.fa-chevron-up {
  color: #1dc8cd;
}

#mobile-nav ul .menu-item-active {
  color: #1dc8cd;
}

#mobile-body-overly {
  width: 100%;
  height: 100%;
  z-index: 997;
  top: 0;
  left: 0;
  position: fixed;
  background: rgba(52, 59, 64, 0.9);
  display: none;
}

/* Mobile Nav body classes */

body.mobile-nav-active {
  overflow: hidden;
}

body.mobile-nav-active #mobile-nav {
  left: 0;
}

body.mobile-nav-active #mobile-nav-toggle {
  color: #fff;
}

/*--------------------------------------------------------------
# Sections
--------------------------------------------------------------*/

/* Sections Header
--------------------------------*/

.section-header .section-title {
  font-size: 32px;
  color: #111;
  text-align: center;
  font-weight: 400;
}

.section-header .section-description {
  text-align: center;
  padding-bottom: 40px;
  color: #777;
  font-style: italic;
}

.section-header .section-divider {
  display: block;
  width: 60px;
  height: 3px;
  background: #1dc8cd;
  background: linear-gradient(0deg, #1dc8cd 0%, #55fabe 100%);
  margin: 0 auto;
  margin-bottom: 20px;
}

/* Section with background
--------------------------------*/

.section-bg {
  background: #eff5f5;
}

/* About Us Section
--------------------------------*/

#about {
  padding: 60px 0;
  overflow: hidden;
}

#about .about-img {
  height: 510px;
  overflow: hidden;
}

#about .about-img img {
  margin-left: -15px;
  max-width: 100%;
}

#about .content .h2 {
  color: #333;
  font-weight: 300;
  font-size: 24px;
}

#about .content h3 {
  color: #777;
  font-weight: 300;
  font-size: 18px;
  line-height: 26px;
  font-style: italic;
}

#about .content p {
  line-height: 26px;
}

#about .content p:last-child {
  margin-bottom: 0;
}

#about .content i {
  font-size: 20px;
  padding-right: 4px;
  color: #1dc8cd;
}

#about .content ul {
  list-style: none;
  padding: 0;
}

#about .content ul li {
  padding-bottom: 10px;
}

/* Product Featuress Section
--------------------------------*/

#features {
  background: #fff;
  padding: 60px 0 0 0;
  overflow: hidden;
}

#features .features-img {
  text-align: center;
  padding-top: 20px;
}

#features .features-img img {
  max-width: 100%;
}

#features .box {
  margin-bottom: 15px;
  text-align: center;
}

#features .icon {
  margin-bottom: 10px;
}

#features .icon i {
  color: #666666;
  font-size: 40px;
  transition: 0.5s;
}

#features .icon i:before {
  background: #1dc8cd;
  background: linear-gradient(45deg, #1dc8cd 0%, #55fabe 100%);
  background-clip: border-box;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

#features .title {
  font-weight: 300;
  margin-bottom: 15px;
  font-size: 22px;
}

#features .title a {
  color: #111;
}

#features .description {
  font-size: 14px;
  line-height: 24px;
  margin-bottom: 10px;
}

#features .section-description {
  padding-bottom: 10px;
}

/* Product Advanced Featuress Section
--------------------------------*/

#advanced-features {
  overflow: hidden;
}

#advanced-features .features-row {
  padding: 60px 0 30px 0;
}

#advanced-features h2 {
  font-size: 26px;
  font-weight: 700;
  color: #000;
}

/*#advanced-features h3 {
  font-size: 16px;
  line-height: 24px;
  font-weight: 400;
  font-style: italic;
  color: #999;
}*/

#advanced-features p {
  line-height: 24px;
  color: #777;
  margin-bottom: 30px;
}

/*#advanced-features i {
  color: #666666;
  font-size: 64px;
  transition: 0.5s;
  float: left;
  padding: 0 15px 0px 0;
  line-height: 1;
}*/

/*#advanced-features i:before {
  background: #1dc8cd;
  background: linear-gradient(45deg, #1dc8cd 0%, #55fabe 100%);
  background-clip: border-box;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}*/

#advanced-features .advanced-feature-img-right {
  max-width: 100%;
  float: right;
  padding: 0 0 30px 30px;
}

#advanced-features .advanced-feature-img-left {
  max-width: 100%;
  float: left;
  padding: 0 30px 30px 0;
}

/* Call To Action Section
--------------------------------*/

#call-to-action {
  overflow: hidden;
  background: linear-gradient(rgba(29, 200, 205, 0.65), rgba(29, 205, 89, 0.2)), url(../img/call-to-action-bg.jpg) fixed center center;
  background-size: cover;
  padding: 80px 0;
}

#call-to-action .cta-title {
  color: #fff;
  font-size: 28px;
  font-weight: 700;
}

#call-to-action .cta-text {
  color: #fff;
}

#call-to-action .cta-btn {
  font-family: "Kanit", sans-serif;
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 8px 30px;
  border-radius: 25px;
  transition: background 0.5s;
  margin: 10px;
  border: 2px solid #fff;
  color: #fff;
}

#call-to-action .cta-btn:hover {
  background: #1dc8cd;
  border: 2px solid #1dc8cd;
}

/* More Features Section
--------------------------------*/

.more-features-name {
  padding: 50px 0 30px 0;
  overflow: hidden;
}

.more-features-name .box {
  padding: 40px;
  margin-bottom: 30px;
  /*box-shadow: 0px 0px 30px rgba(73, 78, 92, 0.15);*/
  background: #fff;
  transition: 0.4s;
}

.more-features-name .icon {
  float: left;
}

.more-features-name .icon i {
  color: #666666;
  font-size: 80px;
  transition: 0.5s;
  line-height: 0;
}

.more-features-name .icon i:before {
  background: #1dc8cd;
  background: linear-gradient(45deg, #1dc8cd 0%, #55fabe 100%);
  background-clip: border-box;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.more-features-name h4 {
  margin-left: 100px;
  font-weight: 700;
  margin-bottom: 15px;
  font-size: 18px;
}

.more-features-name h4 a {
  color: #111;
}

.more-features-name p {
  font-size: 14px;
  margin-left: 100px;
  margin-bottom: 0;
  line-height: 24px;
}

/* Clients Section
--------------------------------*/



#clients {
  padding: 30px 0;
  background: #fff;
  overflow: hidden;
}

/*#clients img {
  max-width: 100%;
  opacity: 0.5;
  transition: 0.3s;
  padding: 15px 0;
}

#clients img:hover {
  opacity: 1;
}*/
/* Clients Section
--------------------------------*/
.clients-img {
  margin: auto;
  max-width: 100%;
  opacity: 0.5;
  transition: 0.3s;
  padding: 15px 0;
}

.clients-img:hover {
  opacity: 1;
}


/* Pricing Section
--------------------------------*/

#pricing {
  padding: 60px 0 60px 0;
  overflow: hidden;
}

#pricing .box {
  padding: 40px;
  margin-bottom: 30px;
  box-shadow: 0px 0px 30px rgba(73, 78, 92, 0.15);
  background: #fff;
  text-align: center;
}

#pricing h3 {
  font-weight: 400;
  margin-bottom: 15px;
  font-size: 28px;
}

#pricing h4 {
  font-size: 46px;
  color: #1dc8cd;
  font-weight: 300;
}

#pricing h4 sup {
  font-size: 20px;
  top: -20px;
}

#pricing h4 span {
  color: #bababa;
  font-size: 20px;
}

#pricing ul {
  padding: 0;
  list-style: none;
  color: #999;
  text-align: left;
  line-height: 20px;
}

#pricing ul li {
  padding-bottom: 12px;
}

#pricing ul i {
  color: #1dc8cd;
  font-size: 18px;
  padding-right: 4px;
}

#pricing .get-started-btn {
  background: #515e61;
  display: inline-block;
  padding: 6px 30px;
  border-radius: 20px;
  color: #fff;
  transition: none;
  font-size: 14px;
  font-weight: 400;
  font-family: "Kanit", sans-serif;
}

#pricing .featured {
  border: 2px solid #1dc8cd;
}

#pricing .featured .get-started-btn {
  background: linear-gradient(45deg, #1de099, #1dc8cd);
}

/* Frequently Asked Questions Section
--------------------------------*/

#faq {
  padding: 60px 0;
  overflow: hidden;
}

#faq #faq-list {
  padding: 0;
  list-style: none;
}

#faq #faq-list li {
  border-bottom: 1px solid #ddd;
}

#faq #faq-list a {
  padding: 18px 0;
  display: block;
  position: relative;
  font-family: "Kanit", sans-serif;
  font-size: 22px;
  line-height: 1;
  font-weight: 300;
  padding-right: 20px;
}

#faq #faq-list i {
  font-size: 24px;
  position: absolute;
  right: 0;
  top: 16px;
}

#faq #faq-list p {
  margin-bottom: 20px;
}

#faq #faq-list a.collapse {
  color: #1dc8cd;
}

#faq #faq-list a.collapsed {
  color: #000;
}

#faq #faq-list a.collapsed i::before {
  content: "\f2c7" !important;
}

/* Our Team Section
--------------------------------*/

#team {
  padding: 60px 0;
  overflow: hidden;
}

#team .member {
  text-align: center;
  margin-bottom: 20px;
}

#team .member .pic {
  margin-bottom: 15px;
  overflow: hidden;
  height: 260px;
}

#team .member .pic img {
  max-width: 100%;
}

#team .member h4 {
  font-weight: 700;
  margin-bottom: 2px;
  font-size: 18px;
}

#team .member span {
  font-style: italic;
  display: block;
  font-size: 13px;
}

#team .member .social {
  margin-top: 15px;
}

#team .member .social a {
  color: #b3b3b3;
}

#team .member .social a:hover {
  color: #1dc8cd;
}

#team .member .social i {
  font-size: 18px;
  margin: 0 2px;
}

/* Gallery Section
--------------------------------*/

#gallery {
  background: #fff;
  padding: 60px 0 0 0;
  overflow: hidden;
}

#gallery .container-fluid {
  padding: 0px;
}

#gallery .gallery-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 1;
  transition: all ease-in-out 0.4s;
}

#gallery .gallery-item {
  overflow: hidden;
  position: relative;
  padding: 0;
  vertical-align: middle;
  text-align: center;
}

#gallery .gallery-item img {
  transition: all ease-in-out 0.4s;
  width: 100%;
}

#gallery .gallery-item:hover img {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}

#gallery .gallery-item:hover .gallery-overlay {
  opacity: 1;
  background: rgba(0, 0, 0, 0.7);
}

/* Contact Section
--------------------------------*/

#contact {
  box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.1);
  padding: 60px 0;
  overflow: hidden;
}

#contact .contact-about h3 {
  font-size: 36px;
  margin: 0 0 10px 0;
  padding: 0;
  line-height: 1;
  font-family: "Kanit", sans-serif;
  font-weight: 300;
  letter-spacing: 3px;
  text-transform: uppercase;
  color: #1dc8cd;
}

#contact .contact-about p {
  font-size: 14px;
  line-height: 24px;
  font-family: "Kanit", sans-serif;
  color: #888;
}

#contact .social-links {
  padding-bottom: 20px;
}

#contact .social-links a {
  font-size: 18px;
  display: inline-block;
  background: #fff;
  color: #1dc8cd;
  line-height: 1;
  padding: 8px 0;
  margin-right: 4px;
  border-radius: 50%;
  text-align: center;
  width: 36px;
  height: 36px;
  transition: 0.3s;
  border: 1px solid #1dc8cd;
}

#contact .social-links a:hover {
  background: #1dc8cd;
  color: #fff;
}

#contact .info {
  color: #333333;
}

#contact .info i {
  font-size: 32px;
  color: #1dc8cd;
  float: left;
  line-height: 1;
}

#contact .info p {
  padding: 0 0 10px 42px;
  line-height: 28px;
  font-size: 14px;
}

#contact .form #sendmessage {
  color: #1dc8cd;
  border: 1px solid #1dc8cd;
  display: none;
  text-align: center;
  padding: 15px;
  font-weight: 600;
  margin-bottom: 15px;
}

#contact .form #errormessage {
  color: red;
  display: none;
  border: 1px solid red;
  text-align: center;
  padding: 15px;
  font-weight: 600;
  margin-bottom: 15px;
}

#contact .form #sendmessage.show,
#contact .form #errormessage.show,
#contact .form .show {
  display: block;
}

#contact .form .validation {
  color: red;
  display: none;
  margin: 0 0 20px;
  font-weight: 400;
  font-size: 13px;
}

.form input,
.form textarea {
  border-radius: 0;
  box-shadow: none;
  font-size: 14px;
}

.form button[type="submit"] {
  background: linear-gradient(45deg, #1de099, #1dc8cd);
  border: 0;
  border-radius: 20px;
  padding: 8px 30px;
  color: #fff;
}
.form button[type="button"] {
  background: linear-gradient(45deg, #1de099, #1dc8cd);
  border: 0;
  border-radius: 20px;
  padding: 8px 30px;
  color: #fff;
}

.form button[type="submit"]:hover {
  cursor: pointer;
  background: linear-gradient(45deg, #00a86b, #82f9fd);
}
.form button[type="button"]:hover {
  cursor: pointer;
  background: linear-gradient(45deg, #00a86b, #82f9fd);
}

.form button[type="submit"]:active {
  cursor: pointer;
  background: linear-gradient(45deg, #0f583d, #15c6cc);
}
.form button[type="button"]:active {
  cursor: pointer;
  background: linear-gradient(45deg, #0f583d, #15c6cc);
}
.button-css {
  background: linear-gradient(45deg, #1de099, #1dc8cd);
  border: 0;
  border-radius: 20px;
  padding: 8px 30px;
  color: #fff;
}
.button-css:hover {
  cursor: pointer;
  background: linear-gradient(45deg, #00a86b, #82f9fd);
}
.button-css:active {
  cursor: pointer;
  background: linear-gradient(45deg, #0f583d, #15c6cc);
}

/*-------------------------------half--------------------------------*/
.left-half-css {
  background: linear-gradient(45deg, #1de099, #1dc8cd);
  border: 0;
  border-right: 2px;
  border-style: solid;
  border-color: #eff5f5;
  border-top-left-radius: 20px;
  border-bottom-left-radius: 20px;
  padding: 8px 30px;
  color: #fff;
}
.left-half-css:hover {
  cursor: pointer;
  background: linear-gradient(45deg, #00a86b, #82f9fd);
}
.left-half-css:active {
  cursor: pointer;
  background: linear-gradient(45deg, #0f583d, #15c6cc);
}
.right-half-css {
  background: linear-gradient(45deg, #1dc8cd, #1de099);
  border: 0;
  border-left: 2px;
  border-style: solid;
  border-color: #eff5f5;
  border-top-right-radius: 20px;
  border-bottom-right-radius: 20px;
  padding: 8px 30px;
  color: #fff;
}
.right-half-css:hover {
  cursor: pointer;
  background: linear-gradient(45deg, #82f9fd, #00a86b);
}
.right-half-css:active {
  cursor: pointer;
  background: linear-gradient(45deg, #15c6cc, #0f583d);
}
.half-active-on {
  pointer-events: none;
  cursor: default;
  background: linear-gradient(45deg, #15c6cc, #0f583d);
}
.center-half-css {
  background: linear-gradient(45deg, #1dc8cd, #1dc8cd);
  border: 0;
  border-right: 2px;
  border-left: 2px;
  border-style: solid;
  border-color: #eff5f5;
  padding: 8px 30px;
  color: #fff;
}
.center-half-css:hover {
  cursor: pointer;
  background: linear-gradient(45deg, #82f9fd, #82f9fd);
}
.center-half-css:active {
  cursor: pointer;
  background: linear-gradient(45deg, #15c6cc, #15c6cc);
}
.center-half-active-on {
  cursor: pointer;
  background: linear-gradient(45deg, #15c6cc, #0f583d);
}

#more-features {
  padding: 60px 0 60px 0;
  overflow: hidden;
}

#more-features .box {
  padding: 40px;
  margin-bottom: 30px;
  box-shadow: 0px 0px 30px rgba(73, 78, 92, 0.15);
  background: #fff;
  transition: 0.4s;
}

#more-features .icon {
  float: left;
}

#more-features .icon i {
  color: #666666;
  font-size: 80px;
  transition: 0.5s;
  line-height: 0;
}

#more-features .icon i:before {
  background: #1dc8cd;
  background: linear-gradient(45deg, #1dc8cd 0%, #55fabe 100%);
  background-clip: border-box;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

#more-features h4 {
  margin-left: 100px;
  font-weight: 700;
  margin-bottom: 15px;
  font-size: 18px;
}

#more-features h4 a {
  color: #111;
}

#more-features p {
  font-size: 14px;
  margin-left: 100px;
  margin-bottom: 0;
  line-height: 24px;
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

#footer {
  background: #fff;
  box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.1);
  padding: 30px 0;
  color: #333;
  font-size: 14px;
}

#footer .credits {
  font-size: 13px;
  color: #888;
}

#footer .footer-links a {
  color: #666;
  padding-left: 15px;
}

#footer .footer-links a:first-child {
  padding-left: 0;
}

#footer .footer-links a:hover {
  color: #1dc8cd;
}

@media (min-width: 769px) {
  #features .features-img {
    padding-top: 120px;
    margin-top: -200px;
  }

  #call-to-action .cta-btn-container {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: end;
    -webkit-justify-content: flex-end;
    -ms-flex-pack: end;
    justify-content: flex-end;
  }
}

@media (min-width: 1025px) {
  #intro {
    background-attachment: fixed;
  }
}

@media (max-width: 768px) {
  #header #logo h1 {
    font-size: 28px;
    margin-top: 0;
  }

  #header #logo img {
    max-height: 40px;
  }

  #intro h2 {
    font-size: 28px;
    line-height: 36px;
  }

  #intro p {
    font-size: 18px;
    line-height: 24px;
    margin-bottom: 20px;
  }

  #nav-menu-container {
    display: none;
  }

  #mobile-nav-toggle {
    display: inline;
  }

  #about .about-img {
    height: auto;
  }

  #about .about-img img {
    margin-left: 0;
    padding-bottom: 30px;
  }

  #advanced-features .advanced-feature-img-right,
  #advanced-features .advanced-feature-img-left {
    max-width: 50%;
  }

  #faq #faq-list a {
    font-size: 18px;
  }

  #faq #faq-list i {
    top: 13px;
  }
}

@media (max-width: 767px) {
  #intro .product-screens .product-screen-1 {
    position: static;
    padding-top: 30px;
  }

  #intro .product-screens .product-screen-2,
  #intro .product-screens .product-screen-3 {
    display: none;
  }

  #advanced-features .advanced-feature-img-right,
  #advanced-features .advanced-feature-img-left {
    max-width: 100%;
    float: none;
    padding: 0 0 30px 0;
  }

  .more-features-name .box {
    margin-bottom: 20px;
  }

  .more-features-name .icon {
    float: none;
    text-align: center;
    padding-bottom: 15px;
  }

  .more-features-name h4,
  .more-features-name p {
    margin-left: 0;
    text-align: center;
  }

  #more-features .box {
    margin-bottom: 20px;
  }
  
  #more-features .icon {
    float: none;
    text-align: center;
    padding-bottom: 15px;
  }
  
  #more-features h4,
  #more-features p {
    margin-left: 0;
    text-align: center;
  }
}
</style>

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
            </div>
        </header><!-- #header -->

        <!--==========================
            Intro Section
        ============================-->
        <section id="intro">
            <div class="intro-text">
                <h2>การเฝ้าระวังโรคโควิด 19 (COVID-19)</h2>
                <p>เขตสุขภาพที่ 4 </p>
            </div>

            <div class="product-screens">
                <div class="wow fadeInUp" data-wow-duration="0.6s">

                </div>
            </div>
        </section><!-- #intro -->

        <main id="main">
            <!--==========================
            About Us Section
            ============================-->
            <section id="about" class="section-bg">
                <div class="container-fluid">
                    <div class="section-header">
                        <h3 class="section-title">เข้าสู่ระบบจัดการงาน</h3>
                        <span class="section-divider"></span>
                    </div>
                </div>
                <div class="container row wow fadeInUp" style="margin: auto;">
                    <div class="col-lg-12 col-md-12">
                        <div class="form">
                            <form method="post" role="form" class="contactForm">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Username</div>
                                            </div>
                                            <input type="text" class="form-control" id="user" name="user" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Password</div>
                                            </div>
                                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mb-4">
                                    <button type="button" id="sent" title="Login"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
                                </div>
                                <div class="text-center">
                                    <a href="index.php"><button type="button" title="back"><i class="fas fa-arrow-circle-left"></i> กลับหน้าหลัก</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section><!-- #about -->
        </main>

        <!--==========================
            Footer
        ============================-->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 text-lg-left text-center">
                    <div class="copyright">
                        Copyright 2019 @Saraburi Provincial Health Office
                    </div>
                        <div class="credits">
                            <!--
                            All the links in the footer should remain intact.
                            You can delete the links only if you purchased the pro version.
                            Licensing information: https://bootstrapmade.com/license/
                            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Avilon
                            -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- #footer -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="lib/jquery/jquery-3.3.1.min.js"></script>
        <script src="lib/jquery/jquery-migrate.min.js"></script>
        <script src="lib/popper.js/dist/umd/popper.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/superfish/hoverIntent.js"></script>
        <script src="lib/superfish/superfish.min.js"></script>
        <script src="lib/magnific-popup/magnific-popup.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="lib/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="lib/datatables-plugins/integration/bootstrap/4/dataTables.bootstrap4.min.js"></script>
        <script src="lib/datatables-plugins/integration/bootstrap/4/responsive.bootstrap4.min.js"></script>
        <!--toastr JavaScript -->
        <script src="lib/toastr/build/toastr.min.js"></script>
        <!-- confirm -->
        <script src="lib/confirm/jquery-confirm.min.js"></script>

        <!-- Contact Form JavaScript File -->
        <script src="contactform/contactform.js"></script>

        <!-- Template Main Javascript File -->
       <!--  <script src="js/main.js"></script>
       -->
        <script>
            $(document).ready(function () {
    toastr.options = {
        "closeButton": false,
        "debug": true,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    $("#sent").click(function () { 
        var user = $("#user").val();
        var pass = $("#pass").val();
        console.log(user);
        $.ajax({
            type: "POST",
            url: "login_check.php",
            data: {user:user, pass:pass},
            success: function (response) {
                //window.alert(response);
                if(response=='yes'){
                    window.location.assign("index.php");
                } else if(response=='empty') {
                    toastr.info('กรุณา! กรอก Username และ Password');
                } else if(response=='fail') {
                    toastr.warning('Username หรือ Password ไม่ถูกต้อง');
                } else if(response=='suspen'){
                    toastr.error('ถูกระงับการใช้งาน! Admin : จังหวัดสระบุรี');
                } else if(response=='error_update'){
                    toastr.error('เกิดข้อผิดพลาด! error(01)');
                } else if(response=='error_insert'){
                    toastr.error('เกิดข้อผิดพลาด! error(02)');
                }else {
                    toastr.error('เกิดข้อผิดพลาด! กรุณาลองใหม่อีกครั้ง');
                } 
            }
        });
        
    });
});
        </script>
    </body>
</html>
