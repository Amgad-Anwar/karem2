<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ asset('asset/home') }}/img/logo.png" type="image/png" sizes="16x16">

    <title>UPI Academy</title>

    <link rel="stylesheet" href="{{ asset('asset/home') }}/css/main-rtl.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Frutiger LT Std:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" media="screen and (max-width:768px)" href="{{ asset('asset/home') }}/css/responsive.css">
</head>

<body style="font-family: 'Frutiger LT Std', sans-serif !important;">
<div id="preloader">
    <div class="preloader-wrap">
        <img style="max-width:30% !important" src="{{ asset('asset/home') }}/img/logo.png" alt="logo" class="img-fluid" />
        <div class="preloader">
            <i>.</i>
            <i>.</i>
            <i>.</i>
        </div>
    </div>
</div>

@include('home.navbar')

<div class="main">

    <!--hero section start-->
    <section class="hero-slider-section bg-image hero-equal-height ptb-120 dark-bg" data-overlay="8">
        <div class="background-image-wraper" style="background: url('{{ asset('asset/home') }}/img/bg-main.png')no-repeat center center / cover; opacity: 1;"></div>
        <div class="owl-carousel owl-theme hero-slider-one custom-dot dot-bottom-center">
            @foreach($sliders as $slider)
            <div class="item">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-12">
                            <div class="hero-content-wrap text-white position-relative z-index">
                                <h1 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="text-white">{{ $slider->title }}</h1>
                                <span style="font-family: 'Frutiger LT Std', sans-serif !important;" class="text-white h5 font-weight-norma">{{ $slider->description }}</span>
                                <div class="action-btns mt-2">
                                    <a style="font-family: 'Frutiger LT Std', sans-serif !important;" href="{{ route('home.one',$slider->id) }}" class="btn btn-brand-03 mr-3">المزيد </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!--hero section end-->

    <!--hero section start
    <section class="hero-section position-relative min-vh-100 background-video-overly flex-column d-flex justify-content-center">
        <video poster="{{ asset('asset/home') }}/img/video-overlay.jpg" class="fit-cover w-100 h-100 position-absolute z--1" autoplay="" muted="" loop="" id="myVideo">
            <source src="http://{{ asset('asset/home') }}.themetags.com/kohost/video/rotation-planet-1.mp4" type="video/mp4">
        </video>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <div class="hero-content-left text-white text-center">
                        <h1 class="text-white display-4 font-weight-bolder"></h1>
                        <p class="lead mb-4">  </p>
                        <a style="font-family: 'Frutiger LT Std', sans-serif !important;" href="#" class="btn btn-brand-01 btn-lg"><i class="far fa-comments mr-2"></i> تسجيل دخول</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    hero section end-->

    <!--hosting promo start-->
    <section class="position-relative zindex-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div style="height: 400px;overflow: auto" class="card hosting-promo border-0 rounded-custom p-4 mt-4 shadow">
                        <div style="padding-top:65px" class="card-body">
                            <div class="hosting-promo-icon mb-3 d-flex justify-content-between">
                                <span class="fad fa-clouds icon-size-lg color-primary"></span>
                            </div>
                            <div class="hosting-promo-content">
                                <h5 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="h6">الرؤية </h5>
                                <p style="font-family: 'Frutiger LT Std', sans-serif !important;font-size:17px">الريادة العالمية في اعتماد الخبرات الاحترافية للموارد البشرية والمشاركة الفاعلة في عمليات الاعتماد الدولي .</p>
                                <a style="font-family: 'Frutiger LT Std', sans-serif !important;" href="#"  class="small-text d-inline-flex align-items-center">
                                    <span>اقراء المزيد</span> <i class="fad fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div style="height: 400px;font-size: 10px" class="card hosting-promo border-0 rounded-custom p-4 mt-4 shadow">
                        <div class="card-body">
                            <div class="hosting-promo-icon mb-3 d-flex justify-content-between">
                                <span class="fad fa-hdd icon-size-lg color-primary"></span>
                            </div>
                            <div class="hosting-promo-content">
                                <h5 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="h6">الرسالة</h5>
                                <p style="font-size:17px">تقديم خدمات الاعتماد الدولي للشهادات الاحترافية  للموارد البشرية من خلال طرق تقويم احترافية متقدمة ومتطورة للمهارات والكفاءات المستهدفة ؛ لدعم مصداقية الشهادات و الخبرات الاحترافية؛ بما يلبي متطلبات التغيير والتطوير المستمر في الكفاءات الوظيفية لمؤسسات العمل وجهات التوظيف ، وبما يطابق المعايير القياسية الوطنية و العالمية  . </p>
                                <a href="#" class="small-text d-inline-flex align-items-center">
                                    <span style="font-family: 'Frutiger LT Std', sans-serif !important;">اقراء المزيد</span> <i class="fad fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hosting promo end-->]

    <!--call to action start-->
    <section class="ptb-60 primary-bg">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-7 col-lg-6">
                    <div class="cta-content-wrap text-white">
                        <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="text-white">ما هو UPI ؟ </h2>
                        <p style="font-size:20px">هو مبادرة احترافية عالمية لضمان جودة وكفاءة الموارد البشرية المتخصصة في تقديم المنتجات والخدمات المختلفة بما يزيد من الانتاجية الفعلية للمورد البشري من خلال منح شهادات احترافية متخصصة بناء على طرق تقويم علمية وعملية ترتبط بقياس المهارات والكفاءات الوظيفية والمهنية والعملية المستهدفة في مؤسسات سوق العمل العالمية ومعتمدة من خلال منظمات دولية متخصصة و خبراء دوليين معتمدين لضمان جودة المورد البشري المتخصص ودعم مصداقية ممارسة تقييم الخبرات الاحترافية لمطابقة المعايير الوطنية و العالمية وبما يسهم في رفع كفاءة الخدمات التدريبية وتطويرها بما يتناسب مع الكفاءات المستهدفة  . </p>
                    </div>
                    <div class="action-btns mt-4">
                        @if(!auth()->check())
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" href="{{ route('login') }}" class="btn btn-brand-03"> تسجيل دخول</a>
                        @endif
                    </div>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="cta-img-wrap text-center">
                        <img src="{{ asset('asset/home') }}/img/bgmain1.jpg" class="img-fluid" alt="server room">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--call to action end-->

    <!--features section start-->
    <div class="feature-section ptb-100 gray-light-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    <div class="section-heading text-center mb-5">
                        <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">كلمة البورد الدولي للشهادات الاحترافية </h2>
                        <p class="lead">تقدمشهد القرن الحادي والعشرين تحرير القوى العاملة والمبادلات التجارية وإطلاق قوى السوق وحركة رأس المال والمعلومات التقنية وتدويلها وإزالة أو تخفيض القيود التشريعية والتنظيمية المتعلقة بالأسواق الوطنية وانفتاحها على المنافسة الدولية.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-md-7 col-lg-6">
                    <div class="feature-content-wrap">
                        <p>ولا شك أننا نعيش في عالم ديناميكي متحرك لأغراض التطور والتميز والابداع والابتكار والريادة، و كلها مصطلحات باتت مكوناً أصيلا  في حياتنا اليومية بل وأصبحت لغة سائدة من يتقنها ويمتلكها يملك مستقبل افضل ومن لم يملكها سيخرج من دائرة  المنافسة  . بل في بعض الاوقات سيخرج من دائرة الوجود وسيظل ينافس علي البقاء ورغم ذلك لن ينجح ولن يكون له فرص في الحياة  اسيراً  لمن يمتلكونها بالتطور والتميز والابداع والابتكار وحتي مكانه الذي ارتضي به في مؤخرة الركاب سيفقده بعد وقت قصير .</p>
                        <a style="font-family: 'Frutiger LT Std', sans-serif !important;" href="#" class="btn btn-outline-brand-01 mt-3" target="_blank">اقراء المزيد</a>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5 d-none d-md-block d-lg-block">
                    <div class="feature-img-wrap text-center">
                        <img src="{{ asset('asset/home') }}/img/home1.jpg" class="img-fluid" alt="server room">
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between mt-5">
                <div class="col-md-5 col-lg-5 d-none d-md-block d-lg-block">
                    <div class="feature-img-wrap text-center">
                        <img src="{{ asset('asset/home') }}/img/home2.jpg" class="img-fluid" alt="server room">
                    </div>
                </div>
                <div class="col-md-7 col-lg-6">
                    <div class="feature-content-wrap">
                        <p>وعلى مستوي الافراد (التعليم الدولي الاحترافي) كنتاج  للتطور السريع خرج مفهوم غير تقليدي لتطوير كفاءات وقدرات العنصر البشري  وهو التعليم الدولي الاحترافي هذا التعليم كان الاكثر تأثيراً وايجابية علي الارتقاء بقدرات الافراد من خلال نظم ادارة واعتماد دولي غير هيكلية العالم كلة من خلال اطلاق (منظمات دولية سيادية – اتفاقيات وقوانين دولية ملزمة – مواصفات ومعايير دولية حاكمة) . </p>
                        <a style="font-family: 'Frutiger LT Std', sans-serif !important;" href="#" class="btn btn-outline-brand-01 mt-3" target="_blank">اقراء المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--features section end-->

    <!--testimonial section start-->
    <section class="review-section ptb-100 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-7">
                    <div class="section-heading text-center">
                        <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">الهيكل التنظيمي </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                    <img src="{{ asset('asset/home') }}/img/team.jpg" class="img-fluid" alt="server room">
            </div>
        </div>
    </section>
    <!--testimonial section end-->


</div>

<!--footer section start-->
<footer class="footer-1 ptb-60 gradient-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-9 mb-4 mb-md-4 mb-sm-4 mb-lg-0">
                <a href="#" class="navbar-brand mb-2">
                    <img style="width: 10% !important;"  src="{{ asset('asset/home') }}/img/logo.png" alt="logo" class="img-fluid" />
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
