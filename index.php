<?php
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Owly - Home</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!--  Third Party Libraries  -->
    <script src="lib/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="lib/jquery-ui-1.10.4.custom.min.js" type="text/javascript"></script>
    <script src="lib/popper.min.js" type="text/javascript"></script>
    <script src="lib/perfect-scrollbar.jquery.min.js"></script>
    <script src="lib/globalize.min.js"></script>
    <script src="lib/paper-dashboard.js" type="text/javascript"></script>
    <script src="lib/angular1.7.8.min.js" type="text/javascript"></script>
    <script src="lib/angular-ui-router-1.0.7.min.js" type="text/javascript"></script>
    <script src="lib/dx19.1.6/Lib/js/jszip.js" type="text/javascript"></script>
    <script src="lib/dx19.1.6/Lib/js/dx.viz-web.js" type="text/javascript"></script>

    <!--  Angular config  -->
    <script src="app.js" type="text/javascript"></script>
    <script src="routing.js" type="text/javascript"></script>

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!--  Services  -->
    <script src="services/svc_api.js" type="text/javascript"></script>

    <!--  Q Framework  -->
    <script src="localisation/local.js" type="text/javascript"></script>
    <script src="framework/ng-common.js" type="text/javascript"></script>
    <script src="framework/custom-list/custom-list.js" type="text/javascript"></script>
    <script src="framework/edit/edit.js" type="text/javascript"></script>

    <!--  Directives  -->

    <!--  Pages  -->
    <script src="pages/welcome/welcome.js" type="text/javascript"></script>
    <script src="pages/service/service.js" type="text/javascript"></script>
</head>

<body ng-app="app" ng-controller="mainCtrl as main">

<!-- Header -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent ">
    <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
            <h1 class="text-light"><a ui-sref="welcome"><img src="assets/img/owly_logo.png" class="img-logo"></a></h1>
        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li ui-sref-active="active" ng-class="{active: $state.includes('welcome')}"><a href="#welcome" ui-sref="welcome">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li ng-show="currentPath === '/service'" ui-sref-active="active" ng-class="{active: $state.includes('service')}"><a href="#service" ui-sref="service">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li ui-sref-active="active" ng-class="{active: $state.includes('contact')}"><a href="#contact" ui-sref="contact">Contact us</a></li>
            </ul>
        </nav>
    </div>
</header>

<div ui-view class="root-ui-view"></div>

<!-- Footer -->
<footer id="footer">
    <div class="container">
        <h3>Owly</h3>
        <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi
            placeat.</p>
        <div class="col-lg-4" data-aos="fade-right">

        </div>
        <div class="social-links">
            <a class="github" target="_blank" href="https://github.com/mixy9"><i class="bx bxl-github"></i></a>
            <a class="instagram" target="_blank" href="https://github.com/mixy9"><i class="bx bxl-instagram"></i></a>
            <a class="linkedin" target="_blank"
               href="https://www.linkedin.com/in/mihaela-trempeti%C4%87-40239317b/?originalSubdomain=hr"><i
               class="bx bxl-linkedin"></i></a>
            <a class="linkedin" target="_blank"
               href="https://www.linkedin.com/in/mihaela-trempeti%C4%87-40239317b/?originalSubdomain=hr"><i
               class="bx bxl-google-plus"></i></a>
        </div>
        <div class="credits">
            Created by <a target="_blank" href="https://github.com/mixy9">Mihaela Trempetić</a>
        </div>
        <div class="copyright">
            &copy; Copyright <strong><span>Owly</span></strong>. All Rights Reserved
        </div>
    </div>
</footer>

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/TweenMax/TweenMax.min.js"></script>
<script src="assets/vendor/wavify/wavify.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
