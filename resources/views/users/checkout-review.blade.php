@extends('layouts.user')
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="row">
            <div class="card">
                <h4 class="card-header">{{__('translation.user_cert')}}</h4>
                <div class="table-responsive">
                    <table class="table datatable-project">
                        <thead>
                        <tr>
                            <th>NO.</th>
                            <th>{{__('translation.cert')}}</th>
                            <th class="text-nowrap">{{__('translation.Description')}}</th>
                            <th>{{__('translation.date')}}</th>
                            <th>{{__('translation.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($enrolls as $enroll)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $enroll->cert->cat->title }}</td>
                                <td>{{ $enroll->cert->title }}</td>
                                <td>{{ date('M j, Y', strtotime( $enroll->created_at)) }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="{{ route('user.invoice',encrypt($enroll->id)) }}">
                                                <i data-feather="eye" class="me-50"></i>
                                                <span>{{__('translation.show')}}</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
