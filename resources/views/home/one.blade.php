<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ asset('asset/home') }}/img/favicon.png" type="image/png" sizes="16x16">

    <title>UPI Academy</title>

    <link rel="stylesheet" href="{{ asset('asset/home') }}/css/main-rtl.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Frutiger LT Std:wght@300&display=swap" rel="stylesheet">
</head>

<body style="font-family: 'Frutiger LT Std', sans-serif !important;">
<div id="preloader">
    <div class="preloader-wrap">
        <img src="{{ asset('asset/home') }}/img/logo.png" alt="logo" class="img-fluid" />
        <div class="preloader">
            <i>.</i>
            <i>.</i>
            <i>.</i>
        </div>
    </div>
</div>
<!--preloader end-->
@include('home.navbar')


<div class="main">

    <!--page header section start-->
    <section class="ptb-120 gradient-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-8">
                    <div class="hero-content-wrap text-white text-center position-relative">
                        <h1 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="text-white">{{ $slider->title }} </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--page header section end-->

    <!--promo section start-->
    <section class="promo-section ptb-100 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-7">
                    <div class="section-heading text-center">
                        <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">{{ $slider->title }}</h2>
                        <p>{{ $slider->description }}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center justify-content-sm-center">
                @foreach($slider->page as $page)
                <div class="col-md-12 col-lg-12">
                    <div class="card single-promo-card single-promo-hover text-center p-2 mt-4">
                        <div class="card-body">
                            <div class="pb-2">
                                <span class="fas fa-cubes icon-size-lg color-primary"></span>
                            </div>
                            <div class="pt-2 pb-3">
                                <h5 style="font-family: 'Frutiger LT Std', sans-serif !important;">{{ $page->title }}</h5>
                                <p class="mb-0">
                                    {!! $page->description !!}
                                 </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </section>
    <!--promo section end-->

</div>

<!--footer section start-->
<footer class="footer-1 ptb-60 gradient-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-9 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
                <a href="#" class="navbar-brand mb-2">
                    <img style="width: 50% !important;"  src="{{ asset('asset/home') }}/img/logo.png" alt="logo" class="img-fluid" />
                </a>
                <br>
                <p>???? ???????????? ???????????????? ???????????? ?????????? ???????? ???????????? ?????????????? ?????????????? ???????????????? ???? ?????????? ???????????????? ???????????????? ???????????????? ?????? ???????? ???? ?????????????????? ?????????????? ???????????? ???????????? ???? ???????? ?????? ???????????? ???????????????? ???????????? ???????? ?????? ?????? ?????????? ?????????? ???????????? ?????????? ?????????? ???????????????? ?????????????????? ???????????????? ???????????????? ???????????????? </p>
                <ul class="list-inline social-list-default background-color social-hover-2 mt-2">
                    <li class="list-inline-item"><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a class="youtube" href="#"><i class="fab fa-youtube"></i></a></li>
                    <li class="list-inline-item"><a class="linkedin" href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li class="list-inline-item"><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
                </ul>
            </div>
            <div class="col-md-12 col-lg-3">
                <div class="row mt-0">
                    <div class="col-sm-6 col-md-12 col-lg-12 mb-4 mb-sm-4 mb-md-0 mb-lg-0">
                        <h6 class="font-weight-normal">??????????????</h6>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">???? ??????</a>
                            </li>
                            <li>
                                <a href="{{ route('home.advisory') }}">?????????????? ???????????????????? ??????????????</a>
                            </li>
                            <li>
                                <a href="{{ route('home.partner') }}">???????????????? ??????????????</a>
                            </li>
                            <li>
                                <a href="{{ route('home.cert') }}">???????????????? ???????????????????? </a>
                            </li>
                            <li>
                                <a href="{{ route('home.quality') }}">???????? ????????????</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end of container-->
</footer>

<!--footer bottom copyright start-->
<div class="footer-bottom py-3 gray-light-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7">
                <div class="copyright-wrap small-text">
                    <p class="mb-0">&copy; UPI Academy, All rights reserved</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="terms-policy-wrap text-lg-right text-md-right text-left">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a class="small-text" href="#">Terms & Condition</a></li>
                        <li class="list-inline-item"><a class="small-text" href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer bottom copyright end-->
<!--footer section end-->
<!--scroll bottom to top button start-->
<div class="scroll-top scroll-to-target primary-bg text-white" data-target="html">
    <span class="fas fa-hand-point-up"></span>
</div>

<script src="{{ asset('asset/home') }}/js/vendors/jquery-3.5.1.min.js"></script>

<script src="{{ asset('asset/home') }}/js/vendors/popper.min.js"></script>

<script src="{{ asset('asset/home') }}/js/vendors/bootstrap.min-rtl.js"></script>

<script src="{{ asset('asset/home') }}/js/vendors/bootstrap-slider.min.js"></script>

<script src="{{ asset('asset/home') }}/js/vendors/jquery.easing.min.js"></script>

<script src="{{ asset('asset/home') }}/js/vendors/owl.carousel.min.js"></script>

<script src="{{ asset('asset/home') }}/js/vendors/countdown.min.js"></script>

<script src="{{ asset('asset/home') }}/js/vendors/jquery.waypoints.min.js"></script>

<script src="{{ asset('asset/home') }}/js/vendors/jquery.rcounterup.js"></script>

<script src="{{ asset('asset/home') }}/js/vendors/magnific-popup.min.js"></script>

<script src="{{ asset('asset/home') }}/js/vendors/validator.min.js"></script>

<script src="{{ asset('asset/home') }}/js/vendors/hs.megamenu.js"></script>

<script src="{{ asset('asset/home') }}/js/app.js"></script>
</body>
</html>
