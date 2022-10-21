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
                                @foreach ( $enrolls as $enroll )
                                <tr>
                                    <td>{{ $enroll->user->name }}</td>
                                    <td>{{ $enroll->user->email }}</td>
                                    <td><span class="badge rounded-pill badge-light-primary me-1">{{ date('M j, Y', strtotime($enroll->user->created_at)) }}</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="{{ route('admin.user.view',$enroll->user->id) }}">
                                                    <i data-feather="eye" class="me-50"></i>
                                                    <span>{{__('translation.view')}}</span>
                                                </a>
                                                <a onclick=" if(confirm('{{__('translation.confirm_delete_user')}}')){
                                                        $('#delete{{ $enroll->user->id }}').submit()}"
                                                   class="dropdown-item" href="#">
                                                    <i data-feather="trash" class="me-50"></i>
                                                    <span>{{__('translation.delete')}}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <form method="post" id="delete{{ $enroll->user->id }}" action="{{ route('admin.user.delete') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $enroll->user->id }}">
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
