@extends('layouts.user')
@section('style')
@endsection
@section('script')
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content chat-application">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="row">
          @foreach($enrolls as $enroll)
            <div class="col-lg-4 col-md-6 col-12">
              <div class="card card-profile">
                <div class="card-body">
                 <h3>{{ $enroll->cert->title }}</h3>
                  <h6 class="text-muted">{{__('translation.chat_with_admin')}}</h6>
                  <span class="badge badge-light-primary profile-badge"></span>
                  <hr class="mb-2" />
                  <button onclick="window.location.href='{{ route('user.chat.cert',$enroll->cert->id) }}'" style="width: 100%" type="button" class="btn btn-outline-success">
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
