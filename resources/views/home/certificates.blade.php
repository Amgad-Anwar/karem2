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
                            <h1 style="font-family: 'Frutiger LT Std', sans-serif !important;" class="text-white">الشهادات الاحترافية </h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--page header section end-->

        <!--feature section tab style start-->
        <section id="about" class="about-section position-relative overflow-hidden ptb-100 ">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-12 col-lg-6">
                        <div class="feature-contents section-heading">
                            <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">ما هي الشهادة الاحترافية</h2>

                            <ul class="check-list-wrap list-one-col py-3">
                                <li>الشهادة الاحترافية هي رخصة دولية تثبت قدرة وكفاءة الشخص الاحترافية وفقا للكفاءات الوظيفية المتعارف عليها دولياً في مجال التخصص.</li>
                                <li>تكون تلك الشهادات من مؤسسات، جامعات، أو منظمات عالمية موثقة ومعتمدة عالميًا من المنتدي الدولي للاعتماد IAF.</li>
                                <li>وتضع تلك المؤسسات معايير معينة للحصول علي الاعتماد الدولي وهو تطبيق متطلبات ومعايير الموصفات الدولية الايزو 17024 لسنة 2012 كذكل متطلبات هيئات ومنظمات الاعتماد المحلية والاقليمية والعالمية .</li>
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

        <!--network map section start-->
        <section class="network-map-section ptb-100 gray-light-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-8">
                        <div class="section-heading text-center mb-5">
                            <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">الفرق بين الشهادات الاحترافية والأكاديمية</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="network-map-wrap">
                            <table border="2" class="data-table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">أوجه المقارنة</th>
                                        <th style="text-align: center;">الشهادات الاكاديمية</th>
                                        <th style="text-align: center;">الشهادات الاحترافية</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>مصدر الشهادة</td>
                                        <td>الجامعات</td>
                                        <td>المنظمات الدولية والمؤسسات المعتمدة من AIF   </td>
                                    </tr>
                                    <tr>
                                        <td>التخصص</td>
                                        <td>شهادات تخصصية معتمدة من الجامعات ولا يمكن سحبها من الأفراد ولا تدل على مستوى اتقان الاعمال التخصصية بمستويات احترافية مختلفة</td>
                                        <td>شهادة احترافية بمستوى اتقان معتمد ومحكم وتراجع دوريا من قبل البورد لاستدامتها او تعليقها او سحبها   </td>
                                    </tr>
                                    <tr>
                                        <td>الفترة الزمنية</td>
                                        <td>ممتدة طول العمر</td>
                                        <td>تراجع دورية وفق أنظمة البورد لاستمرارها او تعليقها أو سحبها وفق اجتياز اختبارات التجديد و نتائج عمليات المتابعة والتغذية الراجعة من الأفراد ومؤسسات سوق العمل وجهات التوظيف . </td>
                                    </tr>
                                    <tr>
                                        <td>طبيعة الدراسة</td>
                                        <td>دراسة منتظمة او انتساب لمدة زمنية محددة من (3- 6 سنوات ) حسب الدرجة العلمية والكلية / المعهد المختص </td>
                                        <td>لا توجد دراسة .  </td>
                                    </tr>
                                    <tr>
                                        <td>طبيعة الاختبارات</td>
                                        <td>اختبارات تحريرية وشفهية ومعملية وسريرية لقياس المعارف والمهارات .
                                            من خلال الجامعة و الكلية والقسم العلمي المختص بتحديد الاختبارات وطبيعتها، وكيفية رصد الدرجات.
                                        </td>
                                        <td>معايير وضع الاختبارت موحدة على مستوى العالم، فالاختبار في مصر يطابق الاختبار في الولايات المتحدة حيث أن الاختبارات الخاصة بقياس الكفاءات الاحترافية تكون من خلال أدوات قياس محكمة ومعتمدة ويتم تحديثها دوريا ومراجعتها من قبل المنظمات الدولية المختصة لاعتماد البورد .  </td>
                                    </tr>
                                    <tr>
                                        <td>شروط الالتحاق</td>
                                        <td>وفقا لأنظمة مجالي التعليم العالي المختصة بالدولة</td>
                                        <td>وفقا للشروط التي تم وضعها من قبل المجلس الاستشاري الدولي للشهادة الاحترافية .  </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">الشهادات الأكاديمية أساس جيد للشهادات المهنية، ولكن ليست مطلوبة في كل الأحيان .</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--network map section end-->

        <!--feature section start-->
        <div class="feature-section ptb-100 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-8">
                        <div class="section-heading text-center mb-5">
                            <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">مميزات الحصول على الشهادات المهنية</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-7 col-lg-6">
                        <div class="feature-content-wrap">
                            <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">اكتساب مهارات جديدة </h2>
                            <p>التدريب والحصول على الشهادات المهنية يثقل من مهاراتك ومعرفتك في المجال الذي قمت باختياره.
                                فتعتمد أغلب الشهادات المهنية على المهارات العملية المحترفة والمتقدمة.
                                وأيضًا تكون المادة العلمية متطورة ومُحدثة لتواكب العصر.
                                .</p>
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" href="#" class="btn btn-outline-brand-01 mt-3" target="_blank">اعرف المزيد</a>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 d-none d-md-block d-lg-block">
                        <div class="feature-img-wrap text-center">
                            <img src="{{ asset('asset/home') }}/img/services.svg" class="img-fluid" alt="server room">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between mt-5">
                    <div class="col-md-5 col-lg-5 d-none d-md-block d-lg-block">
                        <div class="feature-img-wrap text-center">
                            <img src="{{ asset('asset/home') }}/img/create-website.svg" class="img-fluid" alt="server room">
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-6">
                        <div class="feature-content-wrap">
                            <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">التفرد والتميز  </h2>
                            <p>كونك تعمقت في أحد المجالات يجعلك مميزًا في سوق العمل.
                                ويجعل بعض الوظائف وكأنها مصنوعة لأجلك، فهي تتطلب تخصصًا وخبرة في نوع معين من المعرفة.
                                وهذا ما يجعل فرصتك في العمل والميزة التنافسية لك ترتفع.
                            </p>
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" href="#" class="btn btn-outline-brand-01 mt-3" target="_blank">اعرف المزيد</a>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between">
                    <div class="col-md-7 col-lg-6">
                        <div class="feature-content-wrap">
                            <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">الحصول على راتب أعلى   </h2>
                            <p>يعلم المديرون جيدًا الثمن الباهظ سواء في الأموال والمجهود الذي دفعته لأجل الحصول على تلك الشهادة المهنية.
                                ومن ثم يكون لك الأولوية دائمًا في الحصول على راتب أعلى.
                            </p>
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" href="#" class="btn btn-outline-brand-01 mt-3" target="_blank">اعرف المزيد</a>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-5 d-none d-md-block d-lg-block">
                        <div class="feature-img-wrap text-center">
                            <img src="{{ asset('asset/home') }}/img/services.svg" class="img-fluid" alt="server room">
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-between mt-5">
                    <div class="col-md-5 col-lg-5 d-none d-md-block d-lg-block">
                        <div class="feature-img-wrap text-center">
                            <img src="{{ asset('asset/home') }}/img/create-website.svg" class="img-fluid" alt="server room">
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-6">
                        <div class="feature-content-wrap">
                            <h2 style="font-family: 'Frutiger LT Std', sans-serif !important;">فتح مشروع جديد</h2>
                            <p>
                                إن كنت تفكر في فتح مشروع جديد، فيجب أن تدرسه جيدًا من كل الأبعاد.
                                سيكون من الرائع أن تكون رائد أعمال حاصل على شهادات معتمدة موثقة.
                                وتلك الشهادات سوف تزيد من مصداقية مشروعك الناشئ.
                            </p>
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" href="#" class="btn btn-outline-brand-01 mt-3" target="_blank">اعرف المزيد</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--feature section end-->

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
