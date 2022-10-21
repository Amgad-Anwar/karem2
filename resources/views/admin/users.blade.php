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
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('translation.students')}}</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('translation.name')}}</th>
                                <th>{{__('translation.email')}}</th>
                                <th>{{__('translation.Start Date')}}</th>
                                <th>{{__('translation.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><span class="badge rounded-pill badge-light-primary me-1">{{ date('M j, Y', strtotime($user->created_at)) }}</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{ route('admin.user.view',$user->id) }}">
                                                    <i data-feather="eye" class="me-50"></i>
                                                    <span>{{__('translation.view')}}</span>
                                                </a>
                                                <a onclick=" if(confirm('{{__('translation.confirm_delete_user')}}')){
                                                        $('#delete{{ $user->id }}').submit()}"
                                                   class="dropdown-item" href="#">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>{{__('translation.delete')}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <form method="post" id="delete{{ $user->id }}" action="{{ route('admin.user.delete') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                    </form>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach( $certificates as $certificate)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-profile">
                        <img src="{{ asset('asset/admin')}}/images/banner/banner-12.jpg" class="img-fluid card-img-top" alt="Profile Cover Photo"/>
                        <div class="card-body">
                            <div class="profile-image-wrapper">
                                <div class="profile-image">
                                    <div class="avatar">
                                        <img src="{{ asset('asset/admin')}}/images/avatars/me.jpeg" alt="Profile Picture" />
                                    </div>
                                </div>
                            </div>
                            <h3>{{ $certificate->title }}</h3>
                            <span class="badge badge-light-primary profile-badge"></span>
                            <hr class="mb-2" />
                            <a href='{{ route('admin.users.certe',$certificate->id) }}' style="width: 100%" type="button" class="btn btn-outline-success">
                                {{__('translation.enter')}}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection
