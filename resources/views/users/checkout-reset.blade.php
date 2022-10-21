
@extends('layouts.user')
@section('content')
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
                    <div class="col-xl-9 col-md-8 col-12">
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

                    <!-- Invoice Actions -->
                    <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <a class="btn btn-outline-secondary w-100 mb-75" href="{{ route('user.print.invoice',$invoice->id) }}" target="_blank"> {{__('translation.Print')}} </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Invoice Actions -->
                </div>
            </section>

            </div>
        </div>
    </div>
@endsection



