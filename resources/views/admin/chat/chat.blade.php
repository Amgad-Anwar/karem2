@extends('layouts.admin')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content chat-application">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="row">
       @foreach($certs as $cert )
            <div class="col-lg-4 col-md-6 col-12">
              <div class="card card-profile">
                <img src="{{ asset('asset/admin') }}/images/banner/banner-12.jpg" class="img-fluid card-img-top" alt="Profile Cover Photo"/>
                <div class="card-body">
                  <div class="profile-image-wrapper">
                    <div class="profile-image">
                      <div class="avatar">
                        <img src="{{ asset('asset/admin') }}/images/avatars/me.jpeg" alt="Profile Picture" />
                      </div>
                    </div>
                  </div>
                  <h3>{{ $cert->title }}</h3>
                  <h6 class="text-muted">{{ count($cert->enrollments) }} {{__('translation.students')}}</h6>
                  <span class="badge badge-light-primary profile-badge"></span>
                  <hr class="mb-2" />
                  <button onclick="window.location.href='{{ route('admin.chat.cert',$cert->id) }}'" style="width: 100%" type="button" class="btn btn-outline-success">
                    Enter
                  </button>
                </div>
              </div>
            </div>
      @endforeach
      </div>
    </div>
    <!-- END: Content-->
@endsection
