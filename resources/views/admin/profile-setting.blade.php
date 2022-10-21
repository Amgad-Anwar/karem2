@extends('layouts.admin')
@section('script')
    <script src="{{ asset('asset/users') }}/js/scripts/pages/page-account-settings-account.min.js"></script>

@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/users') }}/css/pages/page-profile.min.css">
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-body">
            <div id="user-profile">
                <div class="row">
                    <div class="col-12">
                        <div class="card profile-header mb-2">
                            <!-- profile cover photo -->
                            <img class="card-img-top" src="{{ asset('asset/users') }}/images/profile/user-uploads/timeline.jpg" alt="User Profile Image"/>
                            <!--/ profile cover photo -->

                            <div class="position-relative">
                                <!-- profile picture -->
                                <div class="profile-img-container d-flex align-items-center">
                                    <div class="profile-img">
                                        <img src="{{ url('image/users',$user->photo) }}" class="rounded img-fluid" alt="Card image"/>
                                    </div>
                                    <!-- profile title -->
                                    <div class="profile-title ms-3">
                                        <h2 class="text-white">{{ $user->name }}</h2>
                                        <p class="text-white">{{__('translation.students')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-header-nav">
                                <!-- navbar -->
                                <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                    <button class="btn btn-icon navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <i data-feather="align-justify" class="font-medium-5"></i>
                                    </button>

                                    <!-- collapse  -->
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                            <ul class="nav nav-pills mb-0">
                                                <li class="nav-item">
                                                    <a class="nav-link fw-bold active" href="{{ route('admin.profile') }}">
                                                        <span class="d-none d-md-block">{{__('translation.info')}}</span>
                                                        <i data-feather="rss" class="d-block d-md-none"></i>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link fw-bold" href="{{ route('admin.profile.setting') }}">
                                                        <span class="d-none d-md-block">{{__('translation.setting')}}</span>
                                                        <i data-feather="info" class="d-block d-md-none"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--/ collapse  -->
                                </nav>
                                <!--/ navbar -->
                            </div>
                        </div>
                    </div>
                </div>
                <section id="profile-info">
                    <div class="row">
                        <!-- left profile info section -->
                        <div class="col-lg-12 col-12 order-2 order-lg-1">
                            <!-- profile -->

                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">{{__('translation.Profile Details')}}</h4>
                                </div>
                                <form action="{{ route('admin.profile.edit') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body py-2 my-25">
                                        <!-- header section -->
                                        <div class="d-flex">
                                            <a href="#" class="me-25">
                                                <img
                                                    src="{{ url('image/users',$user->photo) }}"
                                                    id="account-upload-img"
                                                    class="uploadedAvatar rounded me-50"
                                                    alt="profile image"
                                                    height="100"
                                                    width="100"
                                                />
                                            </a>
                                            <!-- upload and reset button -->
                                            <div class="d-flex align-items-end mt-75 ms-1">
                                                <div>
                                                    <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">{{__('translation.upload')}}</label>
                                                    <input type="file" id="account-upload" name="photo" hidden accept="image/*" />
                                                    <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75">{{__('translation.reset')}}</button>
                                                    <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                                                </div>
                                            </div>
                                            <!--/ upload and reset button -->
                                        </div>
                                        <!--/ header section -->

                                        <!-- form -->
                                        <form class="validate-form mt-2 pt-50">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 mb-1">
                                                    <label class="form-label" for="accountFirstName">{{__('translation.name')}}</label>
                                                    <input type="text" class="form-control" id="accountFirstName" name="name"  value="{{ $user->name }}" data-msg="Please enter first name"/>
                                                </div>

                                                <div class="col-12 col-sm-6 mb-1">
                                                    <label class="form-label" for="accountEmail">{{__('translation.email')}}</label>
                                                    <input
                                                        type="email"
                                                        class="form-control"
                                                        id="accountEmail"
                                                        name="email"
                                                        placeholder="Email"
                                                        value="{{ $user->email }}"
                                                    />
                                                </div>
                                                <div class="col-12 col-sm-6 mb-1">
                                                    <label class="form-label" for="accountUsername">{{__('translation.username')}}</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="accountUsername"
                                                        name="username"
                                                        placeholder="username"
                                                        value="{{ $user->username }}"
                                                    />
                                                </div>
                                                <div class="col-12 col-sm-6 mb-1">
                                                    <label class="form-label" for="accountPhoneNumber">{{__('translation.phone')}}</label>
                                                    <input
                                                        type="text"
                                                        class="form-control account-number-mask"
                                                        id="accountPhoneNumber"
                                                        name="phone"
                                                        placeholder="Phone Number"
                                                        value="{{ $user->phone }}"
                                                    />
                                                </div>
                                                <div class="col-12 col-sm-6 mb-1">
                                                    <label class="form-label" for="accountPassword">{{__('translation.password')}}</label>
                                                    <input type="Password" class="form-control" id="accountPassword" name="Password" placeholder="Your Password" />
                                                </div>
                                                <div class="col-12 col-sm-6 mb-1">
                                                    <label class="form-label" for="ConfirmPassword">{{__('translation.password_confirm')}}</label>
                                                    <input type="password" class="form-control" id="ConfirmPassword" name="confirmpassword" placeholder="Confirm Password" />
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mt-1 me-1">{{__('translation.save')}}</button>
                                                    <button type="reset" class="btn btn-outline-secondary mt-1">
                                                        {{__('translation.discard')}}</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--/ form -->
                                    </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
