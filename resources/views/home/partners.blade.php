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
                            <h1 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="text-white">الشراكات والعلاقات الدولية </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--hero section end-->

        <!--our partners section start-->
        <section class="our-partner-section ptb-100 gray-light-bg">
            <div class="container">
                <div class="row">
                    @foreach($partners as $partner)
                        <div class="col-md-4 col-lg-3">
                            <div class="single-partner-wrap card-bottom-line bg-white border rounded text-center p-4 mt-4">
                                <div class="partner-logo mb-3">
                                    <img src="{{  url("image/partner/").'/'.$partner->image_file }} " alt="partner logo" class="img-fluid" />
                                </div>
                                <div class="partner-heading mb-2">
                                    <h5 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="mb-0">{{ $partner->name }}</h5>
                                </div>
                                <div class="partner-info">
                                    <p>{{ $partner->description }}</p>
                                    <a href="{{ $partner->link }}" class="view-details-link">Get more info<span class="ti-angle-right"></span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--our partners section end-->

        <!--faq section start-->
        <section id="faq" class="ptb-100 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-8">
                        <div class="section-heading text-center mb-5">
                            <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">اتفاقيات الاعتراف المتبادل (MRA) </h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12 col-lg-12">
                        <div id="accordion" class="accordion faq-wrap">
                            <div class="card mb-3">
                                <a class="card-header " data-toggle="collapse" href="#collapse0" aria-expanded="false">
                                    <h6 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="mb-0 d-inline-block">يحدث الاعتراف المتبادل عندما تعترف دولتان أو أكثر أو مؤسسات أخرى بقرارات</h6>
                                </a>
                                <div id="collapse0" class="collapse show" data-parent="#accordion" style="">
                                    <div class="card-body white-bg">
                                        <p> يحدث الاعتراف المتبادل عندما تعترف دولتان أو أكثر أو مؤسسات أخرى بقرارات أو سياسات بعضها البعض ، على سبيل المثال في مجال تقييم المطابقة أو المؤهلات المهنية. اتفاقية الاعتراف المتبادل (MRA) هي اتفاقية دولية تتفق بموجبها دولتان أو أكثر على الاعتراف بتقييمات المطابقة أو قراراتها أو نتائجها (على سبيل المثال الشهادات أو نتائج الاختبارات). ويتم تطبيق اتفاقيات MRA بشكل شائع على المؤهلات المهنية الاحترافية . </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card my-3">
                                <a class="card-header collapsed" data-toggle="collapse" href="#collapse1" aria-expanded="false">
                                    <h6 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="mb-0 d-inline-block">ترتيب الاعتراف المتبادل </h6>
                                </a>
                                <div id="collapse1" class="collapse " data-parent="#accordion" style="">
                                    <div class="card-body white-bg">
                                        <p>ترتيب الاعتراف المتبادل هو ترتيب دولي قائم على مثل هذه الاتفاقية لقد أصبحت اتفاقيات MRA شائعة بشكل متزايد منذ تشكيل منظمة التجارة العالمية في عام 1995. وقد تم تشكيلها داخل وبين التكتلات التجارية المختلفة ، بما في ذلك APEC والاتحاد الأوروبي . </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card my-3">
                                <a class="card-header collapsed" data-toggle="collapse" href="#collapse2" aria-expanded="false">
                                    <h6 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="mb-0 d-inline-block">المواصفات الدولية </h6>
                                </a>
                                <div id="collapse2" class="collapse " data-parent="#accordion" style="">
                                    <div class="card-body white-bg">
                                        <p>
                                            انتح مواصفات دولية تضمن جودة هذا النوع من التعليم  وانتجت له المنظمة الدولية للمعايير ‏ ‏ISO  <br>
                                            1-	المواصفة الدولية الايزو 17011 والخاصة بهيئات الاعتماد الدولية والاقليمية والقارية والعالمية  <br>
                                            2-	 المواصفة الدولية الايزو 17024 لسنة 2012 والخاصة بالمنظمات الدولية لاعتماد الافراد  <br>
                                            3-	وهي المواصفة التي  اخذت قبول دول العالم كلة ويطبقها المنظمات الدولية لمنح الشهادات الاحترافية الدولية للافراد وقد اتفق العالم كله علي أن تكون معايير تلك المواصفة هي الحد الادني لهيئات المطابقة والتصديق واعتماد الافراد المحترفيين

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <a class="card-header collapsed" data-toggle="collapse" href="#collapse3" aria-expanded="false">
                                    <h6 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="mb-0 d-inline-block">الشراكات الاقليمية </h6>
                                </a>
                                <div id="collapse3" class="collapse " data-parent="#accordion" style="">
                                    <div class="card-body white-bg">
                                        <p>المركز الدولي للتدريب بجدة   </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--faq section end-->

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
