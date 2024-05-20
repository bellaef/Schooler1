<!DOCTYPE html>
<html lang="end">

<?php

include 'koneksi.php';

?>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SHOOLER</title>

<!-- ::::::::::::::Favicon icon::::::::::::::-->
<link rel="shortcut icon" href="assets/images/LOGOSC.png" type="image/png">

<!-- ::::::::::::::All CSS Files here :::::::::::::: -->
<!-- Vendor CSS -->
<!-- <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/vendor/ionicons.css">
<link rel="stylesheet" href="assets/css/vendor/simple-line-icons.css">
<link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css"> -->

<!-- Plugin CSS -->
<!-- <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
<link rel="stylesheet" href="assets/css/plugins/animate.min.css">
<link rel="stylesheet" href="assets/css/plugins/nice-select.css">
<link rel="stylesheet" href="assets/css/plugins/venobox.min.css">
<link rel="stylesheet" href="assets/css/plugins/jquery.lineProgressbar.css">
<link rel="stylesheet" href="assets/css/plugins/aos.min.css"> -->

<!-- Main CSS -->
<!-- <link rel="stylesheet" href="assets/sass/style.css"> -->

<!-- Use the minified version files listed below for better performance and remove the files listed above -->
<link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
<link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body>
    <!-- Navbar Area -->
    <header class="header-section d-none d-xl-block">
        <div class="header-wrapper">
            <div class="header-bottom header-bottom-color--black section-fluid sticky-header sticky-color--black">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-between">
                            <!-- Start Navbar Logo -->
                            <div class="header-logo">
                                <div class="logo">
                                    <a href="index-sc.html"><img src="assets/images/logo/logo_schooler.png" alt=""></a>
                                </div>
                            </div>
                            <!-- End Navbar Logo -->

                           <!-- Start Navbar Main Menu -->
                           <div class="main-menu menu-color--white menu-hover-color--white">
                            <nav>
                                <ul>
                                    <li><a class="active main-menu-link" href="home.php">Home</a>
                                    </li>
                                    
                                    <li><a href="menu.php">Katalog</a>
                                    </li>
                                    
                                    <li><a href="keranjang.php">Cart</a></li>
                                    
                                    <li>
                                        <a href="about-us.php">About Us</a>
                                    </li>
                                    <li>
                                        <a href="contact-us.php">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="riwayat_pembelian.php">History</a>
                                    </li>

                                </ul>
                            </nav>
                        </div>
                        <!-- End Navbar Main Menu -->
                        <!-- Start Header Action Link -->
                            <ul class="header-action-link action-color--white action-hover-color--golden">
                                <li>
                                    <a href="profil.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                    </svg>                                    
                                    </a>
                                </li>
                                <li>
                                    <a href="logout.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                    </svg>                              </a>
                                </li>
                            </ul>
                            <!-- End Header Action Link -->                           
                            <!-- Sidebar Kanan -->
                           <ul class="header-action-link action-color--white action-hover-color--white">
                            <li>
                                <a href="#offcanvas-about" class="offacnvas offside-about offcanvas-toggle">
                                    <i class="icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Sidebar Kanan -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Navbar Area -->

    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- End Offcanvas Header -->

        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">
            <div class="logo">
                <a href="index.html"><img src="assets/images/logo/logo_schooler.png" alt=""></a>
            </div>

            <address class="address">
                <span>Address: </span>
                <span>Call Us: </span>
                <span>Email: schooleraparel@gmail.com</span>
            </address>

            <ul class="social-link">
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
        <!-- End Mobile contact Info -->
    </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->
    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    
    </div> <!-- End Modal Quickview cart -->

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <!-- <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>  -->

    <!--Plugins JS-->
    <!-- <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/material-scrolltop.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.js"></script>
    <script src="assets/js/plugins/jquery.lineProgressbar.js"></script>
    <script src="assets/js/plugins/aos.min.js"></script>
    <script src="assets/js/plugins/jquery.instagramFeed.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>
</html>