<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120452661-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-120452661-1');
    </script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Just Unite</title>
    <meta content="The official website of Just Unite Foundation" name="description">
    <meta content="Just unite, India, Hindu, Bharat, Jai Hind" name="keywords">
    <meta content="{{$_SESSION['csrf_token']}}" name="csrf-token">

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{'assets/img/favicon-32x32.png'}}" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
{{--    <link href="/assets/css/style2.css" rel="stylesheet">--}}
    <link href="/assets/css/style2.css?version=3" rel="stylesheet">

    @yield('extra_css')
</head>
<body>

<!-- header -->
@include('layouts.partials.header')

<!-- body -->
@yield('content')

<!-- footer -->
@include('layouts.partials.footer')

<!-- Google Recaptcha -->
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback" async defer></script>

<!-- Vendor JS Files -->
<script src="/assets/vendor/aos/aos.js"></script>
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
{{--<script src="/assets/vendor/php-email-form/validate.js"></script>--}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Template Main JS File -->
<script src="/assets/js/main.js"></script>

@yield('extra_js')

</body>
</html>