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
        <section style="background: url('{{ asset('asset/home') }}/img/a1.jpg') !important;" class="ptb-120 gradient-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-8">
                        <div class="hero-content-wrap text-white text-center position-relative">
                            <h1 style="font-family: 'Frutiger LT Std', sans-serif !important;color:black" class="text-black">المجالس الاستشارية الدولية </h1>
                            <p style="font-family: 'Frutiger LT Std', sans-serif !important;color:black" class="lead">هى لجنة استشارية عليا لمجلس الاعتماد وهى مختصة بالتحقق من جميع متطلبات منح الشهادات الاحترافية لضمان الجودة والنزاهة والحيادية وتقديم المبادرات والمقترحات الخاصة بالتحسين المستمر  </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--page header section end-->

 <section id="about" class="about-section position-relative overflow-hidden ptb-100 ">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-12 col-lg-6">
                        <div class="feature-contents section-heading">
                            <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">التشكيل </h2>

                            <ul style="font-family: 'Frutiger LT Std', sans-serif !important;font-size:20px" class="check-list-wrap py-3">
                                <li>تتشكل اللجنة العليا بقرار من مجلس المعهد العالمي للشهادات الاحترافية  وتكون من أكاديميين و خبراء دوليين في التخصصات المهنية وممثلين من جهات الشراكات الخاصة بالشهادة الاحترافية وتتمتع أعمالها بالاستقلالية </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="image-wrap">
                            <img class="img-fluid" src="{{ asset('asset/home') }}/img/organize.jpeg" alt="animation image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--feature section tab style start-->
        <section id="about" class="about-section position-relative overflow-hidden ptb-100 ">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-12 col-lg-6">
                        <div class="feature-contents section-heading">
                            <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">مهام المجالس الاستشارية الدولية </h2>

                            <ul style="font-family: 'Frutiger LT Std', sans-serif !important;font-size:20px" class="check-list-wrap py-3">
                                <li>	المراجعة العلمية والمهنية لـ الـ      SCIMES   </li>
                                <li>	مراجعة عينات من نتائج استطلاعات الرأي والمقابلات مع ممثلي سوق العمل وجهات التوظيف </li>
                                <li>	التحقق من قيام مجلس الخبراء من الاستجابة لآراء سوق العمل وجهات التوظيف</li>
                                <li>	اقتراح التصويبات والتحسين على الـ SCIMES   </li>
                                <li>	تحكيم طرق التقويم ومدى ملائمتها للمهارات والكفاءات المستهدفة</li>
                                <li>	مراجعة بنوك الأسئلة للتحقق من ملائمتها لخريطة التقدير الكمي </li>
                                <li>	اعتماد بيئة الاختبارات المعملية والأجهزة المستخدمة في عملية التقييم </li>
                                <li>	التوصية باعتماد الـ SCIMES   .  </li>
                                <li>	مراجعة واعتماد المتطلبات العلمية والمهنية السابقة للشهادة الاحترافية </li>
                                </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="image-wrap">
                            <img class="img-fluid" src="{{ asset('asset/home') }}/img/feature-17.svg" alt="animation image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--feature section tab style end-->

        <!--our partners section start-->
        <section class="our-partner-section ptb-100 gray-light-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-7">
                        <div class="section-heading text-center">
                            <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">المجالس الاستشارية الدولية </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach( $advisories as $advisory )
                        @if($advisory->type == 'advisory')
                            <div class="col-md-6 col-lg-6">
                                <div class="single-partner-wrap card-bottom-line bg-white border rounded text-center p-4 mt-4">
                                    <div class="partner-heading mb-2">
                                        <h5 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="mb-0">{{ $advisory->title }}</h5>
                                    </div>
                                    <div class="partner-info">
                                        <p>{{ $advisory->description }}</p>
                                        <a href="{{ route('home.advisory.team',encrypt($advisory->id)) }}" class="view-details-link"> 	أعضاء المجلس الاستشاري <span class="ti-angle-right"></span></a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
        <!--our partners section end-->

        <!--call to action start-->
        <section class="ptb-60 primary-bg">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-lg-6">
                        <div class="cta-content-wrap text-white">
                            <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="text-white">UPI معكم لاي استفسار من خلال موقعنا الرسمي</h2>
                        </div>
                        <div class="support-action d-inline-flex flex-wrap">
                            <a href="mailto:support@yourdomain.com" class="mr-3"><i class="fas fa-comment mr-1 color-accent"></i> <span>support@yourdomain.com</span></a>
                            <a href="tel:+00123456789" class="mb-0"><i class="fas fa-phone-alt mr-1 color-accent"></i> <span>+00123456789</span></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-none d-lg-block">
                        <div class="cta-img-wrap text-center">
                            <img src="{{ asset('asset/home') }}/img/call-center-support.svg" width="250" class="img-fluid" alt="server room">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--call to action end-->

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
