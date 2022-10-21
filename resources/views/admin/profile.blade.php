@extends('layouts.admin')
@section('script')

@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin') }}/css/pages/page-profile.min.css">
@endsection
@section('content')
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
                                                    <a class="nav-link fw-bold active" href="#">
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
                            <!-- about -->
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-75">{{__('translation.about')}}</h5>
                                    <div class="mt-2">
                                        <h5 class="mb-75">{{__('translation.username')}}:</h5>
                                        <p class="card-text">{{ $user->username }}</p>
                                    </div>
                                    <div class="mt-2">
                                        <h5 class="mb-75">{{__('translation.email')}}:</h5>
                                        <p class="card-text">{{ $user->email }}</p>
                                    </div>
                                    <div class="mt-2">
                                        <h5 class="mb-50">{{__('translation.phone')}}:</h5>
                                        <p class="card-text mb-0">{{ $user->phone }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--/ about -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

@endsection
