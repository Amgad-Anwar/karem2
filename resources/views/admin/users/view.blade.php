@extends('layouts.admin')
@section('add')
    <a class="nav-link" href="chat.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chat">
        <i class="ficon" data-feather="message-square"></i>
    </a>
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="app-user-view-account">
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
                            <!-- User Card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar-section">
                                        <div class="d-flex align-items-center flex-column">
                                            <img class="img-fluid rounded mt-3 mb-2" src="{{ url('image/users',$user->photo) }}" height="110" width="110" alt="User avatar"/>
                                            <div class="user-info text-center">
                                                <h4>{{ $user->name }}</h4>
                                                <span class="badge bg-light-secondary">{{__('translation.students')}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-around my-2 pt-75">
                                        <div class="d-flex align-items-start me-2">
                          <span class="badge bg-light-primary p-75 rounded">
                            <i data-feather="check" class="font-medium-2"></i>
                          </span>
                                            <div class="ms-75">
                                                <h4 class="mb-0">{{ $enrollCount }}</h4>
                                                <small>{{__('translation.cert')}}</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start">
                          <span class="badge bg-light-primary p-75 rounded">
                            <i data-feather="briefcase" class="font-medium-2"></i>
                          </span>
                                            <div class="ms-75">
                                                <h4 class="mb-0">0</h4>
                                                <small>{{__('translation.reviews')}}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="fw-bolder border-bottom pb-50 mb-1">{{__('translation.Profile Details')}}</h4>
                                    <div class="info-container">
                                        <ul class="list-unstyled">
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">{{__('translation.username')}}:</span>
                                                <span>{{ $user->username }}</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">{{__('translation.email')}}:</span>
                                                <span>{{ $user->email }}</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">{{__('translation.status')}}:</span>
                                                <span class="badge bg-light-success">Active</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">{{__('translation.age')}}:</span>
                                                <span>{{ $user->age }}</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">{{__('translation.phone')}}:</span>
                                                <span>{{ $user->phone }}</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">{{__('translation.lang')}}:</span>
                                                <span>{{ $user->language }}</span>
                                            </li>
                                            <li class="mb-75">
                                                <span class="fw-bolder me-25">{{__('translation.country')}}:</span>
                                                <span>{{ $user->country }}</span>
                                            </li>
                                        </ul>
                                        <div class="d-flex justify-content-center pt-2">
                                            <a onclick=" if(confirm('{{__('translation.confirm_delete_user')}}')){
                                                $('#delete{{ $user->id }}').submit()}"
                                               class="btn btn-primary me-1">
                                                {{__('translation.save')}}
                                            </a>
                                            <a onclick=" if(confirm('{{__('translation.confirm_susp_user')}}')){
                                                $('#Suspended{{ $user->id }}').submit()}"
                                               class="btn btn-outline-danger suspend-user">{{__('translation.suspended')}}</a>
                                        </div>
                                        <form method="post" id="delete{{ $user->id }}" action="{{ route('admin.user.delete') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                        </form>
                                        <form method="post" id="Suspended{{ $user->id }}" action="{{ route('admin.user.suspended') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/ User Sidebar -->
                        @yield('info')
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

@endsection
