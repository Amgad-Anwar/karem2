<!--header section start-->
<div style="" id="header-top-bar" class="top-bar gray-light-bg pb-1">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div style="text-align: center !important;" class="col-md-3 col-lg-3 d-none d-lg-block d-md-block">
                <!--logo start-->
                <a class="navbar-brand pt-0" href="{{ route('home') }}"><img style="width: 100% !important;"  src="{{ asset('asset/home') }}/img/logo.png" alt="logo" class="img-fluid" /></a>
                <!--logo end-->
            </div>
            <div style="text-align: center !important;" class="col-md-6 col-lg-6 d-none d-lg-block d-md-block">
                <ul class="list-unstyled list-inline topbar-nav topbar-nav-left">
                    <li style="display: inline-block !important;" class="nav-item custom-nav-item" data-position="center">
                        <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="nav-link custom-nav-link" href="{{route('home.Accreditation')}}">مجلس الاعتماد</a>
                    </li>
                    <li style="display: inline-block !important;" class="nav-item custom-nav-item" data-position="center">
                        <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="nav-link custom-nav-link" href="{{ route('home.advisory') }}">المجالس الاستشاريه</a>
                    </li>
                    <li style="display: inline-block !important;" class="nav-item custom-nav-item" data-position="center">
                        <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="nav-link custom-nav-link" href="{{ route('home.neutrality') }}">مجلس الحياديه</a>
                    </li>
                    <li style="display: inline-block !important;" class="nav-item custom-nav-item" data-position="center">
                        <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="nav-link custom-nav-link" href="{{ route('home.expert') }}">مجلس الخبراء</a>
                    </li>
                </ul>
            </div>
            <!--about end-->
        @if(auth()->check())
            @if(auth()->user()->type == 1)
                <!--button start-->
                    <li style="margin-left: 10px;" class="nav-item header-nav-last-item d-flex align-items-center">
                        <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="btn btn-brand-03 animated-btn" href="{{ route('admin.organization') }}" target="_blank">
                            <span class="fa fa-user pr-2"></span> Admin Dashboard
                        </a>
                    </li>
                    <!--button end-->
            @elseif(auth()->user()->type == 2)
                <!--button start-->
                    <li style="margin-left: 10px;" class="nav-item header-nav-last-item d-flex align-items-center">
                        <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="btn btn-brand-03 animated-btn" href="{{ route('user') }}" target="_blank">
                            <span class="fa fa-user pr-2"></span> My Dashboard
                        </a>
                    </li>

                    <!--button end-->
            @endif
        @else
            <!--button start-->
                <li style="margin-left: 10px;" class="nav-item header-nav-last-item d-flex align-items-center">
                    <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="btn btn-brand-03 animated-btn" href="{{ route('login') }}" target="_blank">
                        <span class="fa fa-user pr-2"></span> تسجيل دخول
                    </a>
                </li>
                <li class="nav-item header-nav-last-item d-flex align-items-center">
                    <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="btn btn-brand-03 animated-btn" href="{{ route('register.step1') }}" target="_blank">
                        <span class="fa fa-user pr-2"></span> مستخدم جديد
                    </a>
                </li>
                <!--button end-->
            @endif        </div>
    </div>
</div>
<header id="header" class="header-main">
    <!--main header menu start-->
    <div id="logoAndNav" class="main-header-menu-wrap bg-transparent fixed-top">
        <div style="padding: 0 20px">
            <nav class="js-mega-menu navbar navbar-expand-md header-nav">
                <!--logo start-->
                <a class="hide navbar-brand pt-0" href="{{ route('home') }}"><img style="width: 70px !important;"  src="{{ asset('asset/home') }}/img/logo.png" alt="logo" class="img-fluid" /></a>
                <!--logo end-->
                <!--responsive toggle button start-->
                <button type="button" class="navbar-toggler btn" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                        <span id="hamburgerTrigger">
                          <span class="ti-menu"></span>
                        </span>
                </button>
                <!--responsive toggle button end-->

                <!--main menu start-->
                <div style="text-align: center !important;" id="navBar" class="collapse navbar-collapse">
                    <ul class="navbar-nav m-auto main-navbar-nav">
                        <!--home start-->
                        <li class="nav-item custom-nav-item" data-position="center">
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" id="homeMegaMenu" class="nav-link custom-nav-link" href="{{ route('home') }}">من نحن</a>
                        </li>
                        <!--home end-->
                        <li class="nav-item custom-nav-item" data-position="center">
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" id="orgMegaMenu" class="nav-link custom-nav-link" href="{{ route('home.international_recognition') }}">منظمات الاعتراف الدولي</a>
                        </li>
                        <!--hosting start-->
                        <!--domain start-->
                        <li class="nav-item hs-has-mega-menu custom-nav-item position-relative" data-position="center">
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" id="domainMegaMenu" class="nav-link custom-nav-link" href="{{ route('home.partner') }}" aria-haspopup="true" aria-expanded="false">الشراكات </a>
                            <!-- End Demos - Mega Menu -->
                        </li>
                        <!--domain end-->

                        <li class="nav-item hs-has-sub-menu custom-nav-item">
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" id="pagesMegaMenu" class="nav-link custom-nav-link main-link-toggle" href="{{ route('home.cert') }}" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">الشهادات الاحترافية </a>

                            <!-- Pages - Submenu -->
                            <ul id="pagesSubMenu" class="hs-sub-menu main-sub-menu" aria-labelledby="pagesMegaMenu" style="min-width: 230px;">
                                @foreach( $cats as $cat )
                                    <li class="hs-has-sub-menu">
                                        <a id="navLinkPagesPricing" class="nav-link sub-menu-nav-link sub-link-toggle" href="javascript:void(0);" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuPagesPricing">{{ $cat->title }}</a>
                                        <ul id="navSubmenuPagesPricing" class="hs-sub-menu main-sub-menu" aria-labelledby="navLinkPagesPricing" style="min-width: 230px;">
                                            @foreach( $cat->cert as $cert )
                                                <li><a class="nav-link sub-menu-nav-link" href="{{ route('home.cert.detail',encrypt($cert->id)) }}">{{ $cert->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                            <!-- End Pages - Submenu -->
                        </li>

                        <!--about start-->
                        <li class="nav-item custom-nav-item position-relative" data-position="center">
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" id="fintMegaMenu" class="nav-link custom-nav-link" href="{{ route('home.evaluation') }}" aria-haspopup="true" aria-expanded="false">التقيم</a>
                        </li>

                        <!--about start-->
                        <li class="nav-item custom-nav-item position-relative" data-position="center">
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" id="aboutMegaMenu" class="nav-link custom-nav-link" href="{{ route('home.quality') }}" aria-haspopup="true" aria-expanded="false"> الجودة</a>
                        </li>
                        <!--about end-->

                        <li class="nav-item hs-has-sub-menu custom-nav-item">
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="nav-link custom-nav-link main-link-toggle" href="#" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">الخريجين </a>

                            <!-- Pages - Submenu -->
                            <ul class="hs-sub-menu main-sub-menu" aria-labelledby="pagesMegaMenu" style="min-width: 230px;">
                                @foreach( $cats as $cat )
                                    <li class="hs-has-sub-menu">
                                        <a id="navLinkPagesPricing" class="nav-link sub-menu-nav-link sub-link-toggle" href="javascript:void(0);" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuPagesPricing">{{ $cat->title }}</a>
                                        <ul id="navSubmenuPagesPricing" class="hs-sub-menu main-sub-menu" aria-labelledby="navLinkPagesPricing" style="min-width: 230px;">
                                            @foreach( $cat->cert as $cert )
                                                <li><a class="nav-link sub-menu-nav-link" href="{{ route('home.graduates.detail',encrypt($cert->id)) }}">{{ $cert->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- End Pages - Submenu -->
                        </li>

                        <!--about start-->
                           <li class="nav-item hs-has-sub-menu custom-nav-item">
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="nav-link custom-nav-link main-link-toggle" href="{{ route('home.abroval') }}" aria-haspopup="true" aria-expanded="false" aria-labelledby="pagesSubMenu">اكاديمية abbroval </a>

                            <!-- Pages - Submenu -->
                            <ul class="hs-sub-menu main-sub-menu" aria-labelledby="pagesMegaMenu" style="min-width: 230px;">
                                @foreach( $cats as $cat )
                                    <li class="hs-has-sub-menu">
                                        <a id="navLinkPagesPricing" class="nav-link sub-menu-nav-link sub-link-toggle" href="javascript:void(0);" aria-haspopup="true" aria-expanded="false" aria-controls="navSubmenuPagesPricing">{{ $cat->title }}</a>
                                        <ul id="navSubmenuPagesPricing" class="hs-sub-menu main-sub-menu" aria-labelledby="navLinkPagesPricing" style="min-width: 230px;">
                                            @foreach( $cat->cert as $cert )
                                                <li><a class="nav-link sub-menu-nav-link" href="{{ route('home.courses.detail',encrypt($cert->id)) }}">{{ $cert->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- End Pages - Submenu -->
                        </li>
                        <!--about end-->

                        <!--about start-->
                        <li class="nav-item custom-nav-item position-relative" data-position="center">
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="nav-link custom-nav-link" href="{{ route('home.qualifications') }}" aria-haspopup="true" aria-expanded="false"> اطار upi للمؤهلات</a>
                        </li>
                     

                       

                        <li class="hide nav-item custom-nav-item " data-position="center">
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="nav-link custom-nav-link" href="{{route('home.Accreditation')}}">مجلس الاعتماد</a>
                        </li>
                        <li class="hide nav-item custom-nav-item" data-position="center">
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="nav-link custom-nav-link" href="{{ route('home.advisory') }}">المجالس الاستشاريه</a>
                        </li>
                        <li class="hide nav-item custom-nav-item" data-position="center">
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="nav-link custom-nav-link" href="{{ route('home.neutrality') }}">مجلس الحياديه</a>
                        </li>
                        <li class="hide nav-item custom-nav-item" data-position="center">
                            <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="nav-link custom-nav-link" href="{{ route('home.expert') }}">مجلس الخبراء</a>
                        </li>

   @if(auth()->check())
            @if(auth()->user()->type == 1)
                <!--button start-->
                        <li class="hide nav-item header-nav-last-item d-flex align-items-center">
                        <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="btn btn-brand-03 animated-btn" href="{{ route('admin.organization') }}" target="_blank">
                            <span class="fa fa-user pr-2"></span> Admin Dashboard
                        </a>
                    </li>
                    <!--button end-->
            @elseif(auth()->user()->type == 2)
                <!--button start-->
                        <li class="hide nav-item header-nav-last-item d-flex align-items-center">
                        <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="btn btn-brand-03 animated-btn" href="{{ route('user') }}" target="_blank">
                            <span class="fa fa-user pr-2"></span> My Dashboard
                        </a>
                    </li>

                    <!--button end-->
            @endif
        @else
            <!--button start-->
                        <li class="hide nav-item header-nav-last-item d-flex align-items-center">
                    <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="btn btn-brand-03 animated-btn" href="{{ route('login') }}" target="_blank">
                        <span class="fa fa-user pr-2"></span> تسجيل دخول
                    </a>
                </li>
                        <li class="hide nav-item header-nav-last-item d-flex align-items-center">
                    <a style="font-family: 'Frutiger LT Std', sans-serif !important;" class="btn btn-brand-03 animated-btn" href="{{ route('register.step1') }}" target="_blank">
                        <span class="fa fa-user pr-2"></span> مستخدم جديد
                    </a>
                </li>
                <!--button end-->
            @endif   
                     

                    </ul>
                </div>
                <!--main menu end-->
            </nav>
        </div>
    </div>
    <!--main header menu end-->

</header>
<!--header section end-->
