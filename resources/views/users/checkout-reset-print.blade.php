<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

  <meta name="description" content=" ">

  <meta name="keywords" content=" ">

  <meta name="author" content="joinus">

  <title>UPI - user panal</title>

  <link rel="apple-touch-icon" href="{{ asset('asset/users') }}/images/logo/logo.png">

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('asset/users') }}/images/logo/logo.png">

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/vendors/css/vendors.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/vendors/css/charts/apexcharts.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/vendors/css/extensions/toastr.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/bootstrap-extended.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/colors.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/vendors/css/pickers/flatpickr/flatpickr.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/components.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/themes/dark-layout.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/themes/bordered-layout.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/themes/semi-dark-layout.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/pages/app-invoice.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/core/menu/menu-types/vertical-menu.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/pages/dashboard-ecommerce.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/plugins/charts/chart-apex.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/core/menu/menu-types/vertical-menu.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/plugins/forms/pickers/form-flat-pickr.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/plugins/extensions/ext-component-toastr.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/style.css">
</head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="invoice-preview-wrapper">
          <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-12 col-md-12 col-12">
              <div class="card invoice-preview-card">
                <div class="card-body invoice-padding pb-0">
                  <!-- Header starts -->
                  <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                    <div>
                      <div class="logo-wrapper">
                        <img style="width: 100px" src="{{ asset('asset/users') }}/images/logo/logo.png">
                      </div>
                        <p class="card-text mb-25">{{__('translation.address1')}}</p>
                        <p class="card-text mb-25">{{__('translation.address2')}}</p>
                        <p class="card-text mb-0">+201207807796, +201099378744</p>
                    </div>
                    <div class="mt-md-0 mt-2">
                      <h4 class="invoice-title">
                          {{__('translation.Invoice')}}
                        <span class="invoice-number">#P7{{ str_pad( $invoice->id, 6, '0', STR_PAD_LEFT); }}</span>
                      </h4>
                      <div class="invoice-date-wrapper">
                          <p class="invoice-date-title">{{__('translation.Payment Date')}}:</p>
                        <p class="invoice-date">{{ date('M j, Y', strtotime( $invoice->updated_at)) }}</p>
                      </div>
                    </div>
                  </div>
                  <!-- Header ends -->
                </div>

                <hr class="invoice-spacing" />

                <!-- Address and Contact starts -->
                <div class="card-body invoice-padding pt-0">
                  <div class="row invoice-spacing">
                    <div class="col-xl-8 p-0">
                        <h6 class="mb-2">{{__('translation.Invoice To')}}:</h6>
                        <h6 class="mb-25">{{ auth()->user()->name }}</h6>
                        <p class="card-text mb-25">{{ auth()->user()->country }}</p>
                        <p class="card-text mb-25">{{ auth()->user()->phone }}</p>
                        <p class="card-text mb-0">{{ auth()->user()->email }}</p>
                    </div>

                  </div>
                </div>
                <!-- Address and Contact ends -->

                <!-- Invoice Description starts -->
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                    <tr>
                        <th class="py-1">{{__('translation.cert')}}</th>
                        <th class="py-1">{{__('translation.Price')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td class="py-1">
                        <p class="card-text fw-bold mb-25">{{ $invoice->cert->cat->title }}</p>
                        <p class="card-text text-nowrap">
                            {{ $invoice->cert->title }}
                        </p>
                      </td>
                      <td class="py-1">
                        <span class="fw-bold">${{number_format($invoice->cert->price, 2)  }}</span>
                    </td>
                    </tr>
                    </tbody>
                  </table>
                </div>

                <div class="card-body invoice-padding pb-0">
                  <div class="row invoice-sales-total-wrapper">
                    <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                      <p class="card-text mb-0">
                        <span class="fw-bold"></span> <span class="ms-75"></span>
                      </p>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                      <div class="invoice-total-wrapper">
                        <div class="invoice-total-item">
                            <p class="invoice-total-title">{{__('translation.Price')}}:</p>
                          <p class="invoice-total-amount">${{number_format($invoice->cert->price, 2)  }}</p>
                        </div>
                        <div class="invoice-total-item">
                            <p class="invoice-total-title">{{__('translation.Discount')}}:</p>
                          <p class="invoice-total-amount">$00.00</p>
                        </div>
                        <hr class="my-50" />
                        <div class="invoice-total-item">
                            <p class="invoice-total-title">{{__('translation.Total')}}:</p>
                          <p class="invoice-total-amount">${{number_format($invoice->cert->price, 2)  }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Invoice Description ends -->

                <hr class="invoice-spacing" />

                <!-- Invoice Note starts -->
                <div class="card-body invoice-padding pt-0">
                  <div class="row">
                    <div class="col-12">
                        <span class="fw-bold">{{__('translation.Note')}}:</span>
                        <span>{{__('translation.Note_val')}}</span>
                     </div>
                  </div>
                </div>
                <!-- Invoice Note ends -->
              </div>
            </div>
            <!-- /Invoice -->
            <!-- /Invoice Actions -->
          </div>
        </section>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('asset/users') }}/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('asset/users') }}/js/core/app-menu.min.js"></script>
    <script src="{{ asset('asset/users') }}/js/core/app.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('asset/users') }}/js/scripts/pages/app-invoice-print.min.js"></script>
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

<!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/html/ltr/vertical-menu-template-dark/app-invoice-print.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Dec 2021 16:38:55 GMT -->
</html>
