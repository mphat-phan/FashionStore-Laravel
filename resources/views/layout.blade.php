<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?php
            if(isset($product->name)){
                echo $product->name.' - ';
            }
        ?>
        Chang Fashion
    
    </title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KHWT7N83DM"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-KHWT7N83DM');
    </script>
    <link rel="icon" href="{{asset('public/images/logo_icon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/assetClient/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('public/assetClient/css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('public/assetClient/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assetClient/css/lightslider.min.css')}}">
    <!-- nice select CSS -->
    <link rel="stylesheet" href="{{asset('public/assetClient/css/nice-select.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('public/assetClient/css/all.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('public/assetClient/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('public/assetClient/css/themify-icons.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('public/assetClient/css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('public/assetClient/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('public/assetClient/css/price_rangs.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('public/assetClient/css/style.css')}}">
</head>

<body>
    <!--::header part start::-->
    @include('header');
    <!-- Header part end-->

    @yield('content')

    <!--::footer_part start::-->
    @include('footer');
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="{{asset('public/assetClient/js/jquery-1.12.1.min.js')}}"></script>
    <!-- popper js -->
    <script src="{{asset('public/assetClient/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('public/assetClient/js/bootstrap.min.js')}}"></script>
    <!-- easing js -->
    <script src="{{asset('public/assetClient/js/jquery.magnific-popup.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('public/assetClient/js/swiper.min.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('public/assetClient/js/masonry.pkgd.js')}}"></script>
    <!-- swiper js -->
    <script src="{{asset('public/assetClient/js/lightslider.min.js')}}"></script>
    <!-- particles js -->
    <script src="{{asset('public/assetClient/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/assetClient/js/jquery.nice-select.min.js')}}"></script>
    <!-- slick js -->
    <script src="{{asset('public/assetClient/js/slick.min.js')}}"></script>
    
    <script src="{{asset('public/assetClient/js/swiper.jquery.js')}}"></script>
    <script src="{{asset('public/assetClient/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('public/assetClient/js/waypoints.min.js')}}"></script>
    <script src="{{asset('public/assetClient/js/contact.js')}}"></script>
    <script src="{{asset('public/assetClient/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('public/assetClient/js/jquery.form.js')}}"></script>
    <script src="{{asset('public/assetClient/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('public/assetClient/js/mail-script.js')}}"></script>
    <script src="{{asset('public/assetClient/js/stellar.js')}}"></script>
    
    <script src="{{asset('public/assetClient/js/price_rangs.js')}}"></script>
    <!-- custom js -->
    <script src="{{asset('public/assetClient/js/theme.js')}}"></script>
    <script src="{{asset('public/assetClient/js/custom.js')}}"></script>
</body>

</html>