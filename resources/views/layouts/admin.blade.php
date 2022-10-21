<!DOCTYPE html>
<html class="loading dark-layout" lang="{{ app()->getLocale() }}" data-layout="dark-layout" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <meta name="description" content=" ">

    <meta name="keywords" content=" ">

    <meta name="author" content="joinus">

    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <title>UPI - Admin panal</title>

    <link rel="apple-touch-icon" href="{{ asset('asset/admin')}}/images/logo/logo.png">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/admin')}}/images/logo/logo.png">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    @if(app()->getLocale() == 'en')
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/vendors/css/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/vendors/css/charts/apexcharts.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/vendors/css/extensions/toastr.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/bootstrap-extended.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/colors.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/components.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/themes/dark-layout.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/themes/bordered-layout.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/themes/semi-dark-layout.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/core/menu/menu-types/vertical-menu.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/pages/dashboard-ecommerce.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/plugins/charts/chart-apex.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/plugins/extensions/ext-component-toastr.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/style.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/plugins/extensions/ext-component-ratings.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/vendors/css/extensions/jquery.rateyo.min.css">
    @elseif(app()->getLocale() == 'ar')

        <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/vendors/css/vendors.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/vendors/css/charts/apexcharts.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/vendors/css/extensions/toastr.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl') }}/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl') }}/bootstrap-extended.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl') }}/colors.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl') }}/components.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl') }}/themes/dark-layout.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl') }}/themes/bordered-layout.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl') }}/themes/semi-dark-layout.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl') }}/core/menu/menu-types/vertical-menu.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl') }}/pages/dashboard-ecommerce.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl') }}/plugins/charts/chart-apex.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl') }}/plugins/extensions/ext-component-toastr.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl') }}/style.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl') }}/plugins/extensions/ext-component-ratings.min.css">


        <link rel="stylesheet" type="text/css" href="{{ asset('css-rtl/custom-rtl.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/vendors/css/extensions/jquery.rateyo.min.css">


    @endif

    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    @yield('style')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-dark navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block">
                    <div class="form-modal-ex">
                        <!-- Button trigger modal -->
                        @yield('add')

                    </div>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ms-auto">
            @include('lang.lang')
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="sun"></i></a></li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
                <div class="search-input">
                    <div class="search-input-icon"><i data-feather="search"></i></div>
                    <input class="form-control input" type="text" placeholder="Explore..." tabindex="-1" data-search="search">
                    <div class="search-input-close"><i data-feather="x"></i></div>
                    <ul class="search-list search-list-main"></ul>
                </div>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name fw-bolder">{{ auth()->user()->name }}</span>
                        <span class="user-status">Admin</span>
                    </div>
                    <span class="avatar">
                <img class="round" src="{{ url('image/users',auth()->user()->photo) }}" alt="avatar" height="40" width="40">
                <span class="avatar-status-online"></span>
              </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="me-50" data-feather="user"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" onclick="$('#logout').submit()" ><i class="me-50" data-feather="power"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END: Header-->
<form method="post" id="logout" action="{{ route('logout') }}">
    @csrf
</form>


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="index.html">
            <span class="brand-logo">
                <img src="{{ asset('asset/admin') }}/images/logo/logo.png ">
            </span>
                    <h2 class="brand-text">UPI</h2></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('admin.organization') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Add Data</span><span class="badge badge-light-warning rounded-pill ms-auto me-1">4</span></a>
                <ul class="menu-content">
                    <li class="{{ $page == 'organizer'?'active':''}}">
                        <a class="d-flex align-items-center" href="{{ route('admin.organization') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Organizational">{{ __('translation.organizational') }}</span>
                        </a>
                    </li>
                    <li class="{{ $page == 'slider'?'active':''}}">
                        <a class="d-flex align-items-center" href="{{ route('admin.slider') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="slider">{{ __('translation.slider') }}</span>
                        </a>
                    </li>
                    <li class="{{ $page == 'advisory'?'active':''}}">
                        <a class="d-flex align-items-center" href="{{ route('admin.advisory') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="advisory">{{ __('translation.advisory_board') }}</span>
                        </a>
                    </li>
                    <li class="{{ $page == 'partner'?'active':''}}">
                        <a class="d-flex align-items-center" href="{{ route('admin.partner') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Partners">{{ __('translation.partners') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Certificates">{{ __('translation.cert') }}</span>
                        </a>
                        <ul class="menu-content">
                            <li class="{{ $page == 'cat'?'active':''}}"><a class="d-flex align-items-center" href="{{ route('admin.certificate.category') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">{{ __('translation.cert_cat') }}</span></a>
                            </li>
                            <li class="{{ $page == 'desc'?'active':''}}"><a class="d-flex align-items-center" href="{{ route('admin.certificate.descriptions') }}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">{{ __('translation.cert_details') }}</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span data-i18n="Pages">Pages</span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('admin.users') }}"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="User">{{ __('translation.users') }}</span></a></li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="{{ route('admin.chat') }}"><i data-feather="message-square"></i><span class="menu-title text-truncate" data-i18n="Chat">{{ __('translation.chat') }}</span></a></li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

@yield('content')


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">{{ __('translation.copyright') }}  &copy; 2022<a class="ms-25" href="#" target="_blank">UPI Academy</a><span class="d-none d-sm-inline-block">, {{ __('translation.rights_reserved') }}</span></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

@yield('modal')

<script src="{{ asset('asset/admin')}}/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('asset/admin') }}/vendors/js/charts/apexcharts.min.js"></script>
<script src="{{ asset('asset/admin') }}/vendors/js/extensions/toastr.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('asset/admin') }}/js/core/app-menu.min.js"></script>
<script src="{{ asset('asset/admin') }}/js/core/app.min.js"></script>
<script src="{{ asset('asset/admin') }}/js/scripts/customizer.min.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('asset/admin') }}/js/scripts/pages/dashboard-ecommerce.min.js"></script>
<!-- END: Page JS-->

<script src="{{ asset('asset/admin') }}/js/scripts/components/components-modals.min.js"></script>

<!-- BEGIN: Page JS-->
<script src="{{ asset('asset/admin') }}/js/scripts/extensions/ext-component-ratings.min.js"></script>
<script src="{{ asset('asset/admin') }}/vendors/js/extensions/jquery.rateyo.min.js"></script>
<!-- END: Page JS-->
@yield('script')


<script>
    $(window).on('load',  function(){
        if (feather) {
            feather.replace({ width: 14, height: 14 });
        }
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>
