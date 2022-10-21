@extends('layouts.user')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="row match-height">
        <!-- Congratulations Card -->
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-congratulations">
                <div class="card-body text-center">
                    <img src="{{ asset('asset/users')}}/images/elements/decore-left.png" class="congratulations-img-left" alt="card-img-left"/>
                    <img src="{{ asset('asset/users')}}/images/elements/decore-right.png" class="congratulations-img-right" alt="card-img-right"/>
                    <div class="avatar avatar-xl bg-primary shadow">
                        <div class="avatar-content">
                            <i data-feather="award" class="font-large-1"></i>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="mb-1 text-white">Congratulations {{ auth()->user()->name }},</h1>
                        <p class="card-text m-auto w-75">
                            You have successfully booked <span class="font-weight-bold"> {{ $enroll->cert->title }}</span> certificate, but you cannot enter the certificate or the exam for the certificate unless you pay
                            You can pay through our office or pay online
                            If you pay at the place, you will not get the certificate or test unless you pay at the place
                            You can pay online now and find out the exam date and enter the certificate
                        </p>
                      <!--  <button style="margin-top: 10px" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addNewCard">
                            Pay Online
                        </button> -->
                        <a href="{{ route('user.checkout', $enroll->cert->id ) }}" style="margin-top: 10px" class="btn btn-success">
                            pay {{ $enroll->cert->price }} $ Online Now
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT  &copy; 2021<a class="ms-25" href="#" target="_blank">UPI Academy</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
<!-- END: Footer-->

<!-- add new card modal  -->
<div class="modal fade" id="addNewCard" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 mx-50 pb-5">
                <h1 class="text-center mb-1" id="addNewCardTitle">Pay for Certificate</h1>
                <p class="text-center">Add card for future billing</p>

                <!-- form -->
                <form id="addNewCardValidation" class="row gy-1 gx-2 mt-75" onsubmit="return false">
                    <div class="col-12">
                        <label class="form-label" for="modalAddCardNumber">Card Number</label>
                        <div class="input-group input-group-merge">
                            <input
                                id="modalAddCardNumber"
                                name="modalAddCard"
                                class="form-control add-credit-card-mask"
                                type="text"
                                placeholder="1356 3215 6548 7898"
                                aria-describedby="modalAddCard2"
                                data-msg="Please enter your credit card number"
                            />
                            <span class="input-group-text cursor-pointer p-25" id="modalAddCard2">
                                    <span class="add-card-type"></span>
                                </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="modalAddCardName">Name On Card</label>
                        <input type="text" id="modalAddCardName" class="form-control" placeholder="John Doe" />
                    </div>

                    <div class="col-6 col-md-3">
                        <label class="form-label" for="modalAddCardExpiryDate">Exp. Date</label>
                        <input
                            type="text"
                            id="modalAddCardExpiryDate"
                            class="form-control add-expiry-date-mask"
                            placeholder="MM/YY"
                        />
                    </div>

                    <div class="col-6 col-md-3">
                        <label class="form-label" for="modalAddCardCvv">CVV</label>
                        <input
                            type="text"
                            id="modalAddCardCvv"
                            class="form-control add-cvv-code-mask"
                            maxlength="3"
                            placeholder="654"
                        />
                    </div>

                    <div class="col-12">
                        <div class="d-flex align-items-center">
                            <div class="form-check form-switch form-check-primary me-25">
                                <input type="checkbox" class="form-check-input" id="saveCard" checked />
                                <label class="form-check-label" for="saveCard">
                                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                                </label>
                            </div>
                            <label class="form-check-label fw-bolder" for="saveCard">Save Card for future billing?</label>
                        </div>
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-1 mt-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--/ add new card modal  -->



<!-- BEGIN: Vendor JS-->
<script src="{{ asset('asset/users')}}/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('asset/users')}}/vendors/js/charts/apexcharts.min.js"></script>
<script src="{{ asset('asset/users')}}/vendors/js/extensions/toastr.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('asset/users')}}/js/core/app-menu.min.js"></script>
<script src="{{ asset('asset/users')}}/js/core/app.min.js"></script>
<script src="{{ asset('asset/users')}}/js/scripts/customizer.min.js"></script>
<!-- END: Theme JS-->

<script src="{{ asset('asset/users')}}/vendors/js/forms/wizard/bs-stepper.min.js"></script>
<script src="{{ asset('asset/users')}}/vendors/js/forms/select/select2.full.min.js"></script>
<script src="{{ asset('asset/users')}}/vendors/js/forms/cleave/cleave.min.js"></script>
<script src="{{ asset('asset/users')}}/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
<script src="{{ asset('asset/users')}}/vendors/js/forms/validation/jquery.validate.min.js"></script>

<!-- BEGIN: Page JS-->
<script src="{{ asset('asset/users')}}/js/scripts/pages/dashboard-ecommerce.min.js"></script>
<!-- END: Page JS-->

<script>
    $(window).on('load',  function(){
        if (feather) {
            feather.replace({ width: 14, height: 14 });
        }
    })
</script>
</body>
</html>
