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

    <!--hero section start-->
    <section class="ptb-120 gradient-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-8">
                    <div class="hero-content-wrap text-white text-center position-relative">
                        <h1 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="text-white">{{ $blog->title }}</h1>
                        <p style="font-family: 'Frutiger LT Std', sans-serif !important;" class="lead">{{ Str::limit($blog->description, 131,'') }}.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero section end-->

    <!--blog details section start-->
    <div class="module ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <!-- Post-->
                    <article class="post">
                        <div class="post-preview"><img src="{{ url($blog->cover) }}" alt="article" class="img-fluid" /></div>
                        <div class="post-wrapper">
                            <div class="post-header">
                                <h1 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="post-title">{{ $blog->title }}</h1>
                                <ul class="post-meta">
                                    <li>{{ date('M j, Y', strtotime( $blog->created_at)) }}</li>
                                </ul>
                            </div>
                            <div class="post-content">
                                <p>
                                    {{ $blog->description }}
                                </p>
                            </div>
                        </div>
                    </article>
                    <!-- Post end-->
                </div>
            </div>
        </div>
    </div>
    <!--blog details section end-->

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
                <p>هو مبادرة احترافية عالمية لضمان جودة وكفاءة الموارد البشرية المتخصصة في تقديم المنتجات والخدمات المختلفة بما يزيد من الانتاجية الفعلية للمورد البشري من خلال منح شهادات احترافية متخصصة بناء على طرق تقويم علمية وعملية ترتبط بقياس المهارات والكفاءات الوظيفية والمهنية والعملية </p>
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
                        <h6 class="font-weight-normal">صفحاتنا</h6>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">من نحن</a>
                            </li>
                            <li>
                                <a href="{{ route('home.advisory') }}">المجالس الاستشارية الدولية</a>
                            </li>
                            <li>
                                <a href="{{ route('home.partner') }}">الشراكات الدولية</a>
                            </li>
                            <li>
                                <a href="{{ route('home.cert') }}">الشهادات الاحترافية </a>
                            </li>
                            <li>
                                <a href="{{ route('home.quality') }}">ضمان الجودة</a>
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
<!--scroll bottom to top button end-->
<!--build:js-->
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
<!--endbuild-->
</body>


<!-- Mirrored from kohost.themetags.com/rtl/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Dec 2021 10:44:22 GMT -->
</html>
