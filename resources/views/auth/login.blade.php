<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

      <meta name="description" content=" ">

      <meta name="keywords" content=" ">

      <meta name="author" content="joinus">

      <title>UPI - Admin panal</title>

      <link rel="apple-touch-icon" href="{{ asset('asset/admin') }}/images/logo/logo.png">

      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/admin') }}/images/logo/logo.png">

      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

      <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/vendors/css/vendors.min.css">

      <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/bootstrap.min.css">

      <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/bootstrap-extended.min.css">

      <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/colors.min.css">

      <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/components.min.css">

      <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/themes/dark-layout.min.css">

      <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/themes/bordered-layout.min.css">

      <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/themes/semi-dark-layout.min.css">

      <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/core/menu/menu-types/vertical-menu.min.css">

      <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/plugins/forms/form-validation.css">

      <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/pages/authentication.css">

      <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/style.css">
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
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
              <!-- Brand logo--><a class="brand-logo" href="index.html">
              <img width="75px" src="{{ asset('asset/admin') }}/images/logo/logo.png"></a>
              <!-- /Brand logo-->
              <!-- Left Text-->
              <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="{{ asset('asset/admin') }}/images/pages/login-v2-dark.svg" alt="Login V2"/></div>
              </div>
              <!-- /Left Text-->
              <!-- Login-->
              <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                  <h2 class="card-title fw-bold mb-1">{{__('translation.welcome_upi')}}</h2>
                  <p class="card-text mb-2">{{__('translation.sing_in')}}</p>
                    <form class="auth-login-form mt-2" method="POST" action="{{ route('login') }}">
                        @csrf


                        <div class="mb-1">
                            <label class="form-label" for="login-email">{{__('translation.email')}}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                              <label class="form-label" for="login-password">{{__('translation.password')}}</label><a href="{{ route('password.request') }}"><small>Forgot Password?</small></a>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>

                          <div class="mb-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember-me"> {{__('translation.remember_me')}}</label>
                            </div>
                          </div>

                          <button class="btn btn-primary w-100" type="submit" tabindex="4">{{__('translation.sing_in')}}</button>
                    </form>
                    <p class="text-center mt-2"><span>{{__('translation.new_in_here')}}</span><a href="{{ route('register.step1') }}"><span>&nbsp;{{__('translation.sign_up')}}</span></a></p>
                </div>
              </div>
              <!-- /Login-->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('asset/admin') }}/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('asset/admin') }}/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('asset/admin') }}/js/core/app-menu.min.js"></script>
    <script src="{{ asset('asset/admin') }}/js/core/app.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('asset/admin') }}/js/scripts/pages/auth-login.js"></script>
    <!-- END: Page JS-->

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
  </body>
  <!-- END: Body-->
</html>
