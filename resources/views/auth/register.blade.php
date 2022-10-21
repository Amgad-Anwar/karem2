<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <meta name="description" content=" ">

    <meta name="keywords" content=" ">

    <meta name="author" content="joinus">

    <title>UPI - Register</title>

    <link rel="apple-touch-icon" href="{{ asset('asset/admin')}}/images/logo/logo.png">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/admin')}}/images/logo/logo.png">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
          rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/vendors/css/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/vendors/css/forms/wizard/bs-stepper.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/vendors/css/forms/select/select2.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/css/bootstrap-extended.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/css/colors.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/css/components.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/css/themes/dark-layout.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/css/themes/bordered-layout.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/css/themes/semi-dark-layout.min.css">

    <link rel="stylesheet" type="text/css"
          href="{{ asset('asset/admin')}}/css/core/menu/menu-types/vertical-menu.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/css/plugins/forms/form-wizard.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/css/plugins/forms/form-validation.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/css/pages/authentication.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin')}}/css/style.css">
    @toastr_css
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="blank-page">
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-cover">
                <div class="auth-inner row m-0">
                    <!-- Brand logo-->
                    <a class="brand-logo" href="#">
                        <img width="75px" src="{{ asset('asset/admin')}}/images/logo/logo.png">
                    </a>
                    <!-- /Brand logo-->

                    <!-- Left Text-->
                    <div class="col-lg-3 d-none d-lg-flex align-items-center p-0">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center">
                            <img
                                class="img-fluid w-100"
                                src="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/images/illustration/create-account.svg"
                                alt="multi-steps"
                            />
                        </div>
                    </div>
                    <!-- /Left Text-->

                    <!-- Register-->
                    <div class="col-lg-9 d-flex align-items-center auth-bg px-2 px-sm-3 px-lg-5 pt-3">
                        <div class="width-700 mx-auto">
                            <div class="bs-stepper register-multi-steps-wizard shadow-none">

                                @yield('tap')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="{{ asset('asset/admin')}}/vendors/js/vendors.min.js"></script>

<script src="{{ asset('asset/admin')}}/vendors/js/forms/wizard/bs-stepper.min.js"></script>

<script src="{{ asset('asset/admin')}}/vendors/js/forms/select/select2.full.min.js"></script>

<script src="{{ asset('asset/admin')}}/vendors/js/forms/validation/jquery.validate.min.js"></script>

<script src="{{ asset('asset/admin')}}/vendors/js/forms/cleave/cleave.min.js"></script>

<script src="{{ asset('asset/admin')}}/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>

<script src="{{ asset('asset/admin')}}/js/core/app-menu.min.js"></script>

<script src="{{ asset('asset/admin')}}/js/core/app.min.js"></script>

<script src="{{ asset('asset/admin')}}/js/scripts/pages/auth-register.min.js"></script>
@jquery
@toastr_js
@toastr_render
<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({width: 14, height: 14});
        }
    })

    $('#mylist').change(function () {
        if ($(this).val() == 'applicable') {
            $('#id').show();
        } else {
            $('#id').hide();
        }
    });
    $('#mylist2').change(function () {
        if ($(this).val() == 'applicable') {
            $('#id2').show();
        } else {
            $('#id2').hide();
        }
    });
    $('#mylist3').change(function () {
        if ($(this).val() == 'applicable') {
            $('#id3').show();
        } else {
            $('#id3').hide();
        }
    });
    $('#mylist4').change(function () {
        if ($(this).val() == 'applicable') {
            $('#id4').show();
        } else {
            $('#id4').hide();
        }
    });
    $('#mylist5').change(function () {
        if ($(this).val() == 'applicable') {
            $('#id5').show();
        } else {
            $('#id5').hide();
        }
    });
    $('#mylist6').change(function () {
        if ($(this).val() == 'applicable') {
            $('#id6').show();
        } else {
            $('#id6').hide();
        }
    });
    $('#mylist7').change(function () {
        if ($(this).val() == 'applicable') {
            $('#id7').show();
        } else {
            $('#id7').hide();
        }
    });
    $('#mylist8').change(function () {
        if ($(this).val() == 'applicable') {
            $('#id8').show();
        } else {
            $('#id8').hide();
        }
    });
</script>

</body>
<!-- END: Body-->
</html>
