@extends('admin.users.view')
@section('add')
    <a class="nav-link" href="chat.html" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chat">
        <i class="ficon" data-feather="message-square"></i>
    </a>
@endsection
@section('info')
    <!-- User Content -->
    <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
         <!-- User Pills -->
         <ul class="nav nav-pills mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.view',$user->id) }}">
                    <i data-feather="user" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">{{__('translation.account')}}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.certificate',$user->id) }}">
                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">{{__('translation.user_cert')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.exam',$user->id) }}">
                    <i data-feather="bookmark" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">{{__('translation.exam')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.info',$user->id) }}">
                    <i data-feather="bell" class="font-medium-3 me-50"></i><span class="fw-bold">{{__('translation.info')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.user.reverse',$user->id) }}">
                    <i data-feather="link" class="font-medium-3 me-50"></i><span class="fw-bold">{{__('translation.user_reservation')}}</span>
                </a>
            </li>
        </ul>
        <!--/ User Pills -->

        <!-- Project table -->
        <div class="card">
            <h4 class="card-header">{{__('translation.user_reservation')}}</h4>
            <div class="table-responsive">
                <table class="table datatable-project">
                    <thead>
                    <tr>
                        <th>{{__('translation.Paid')}}</th>
                        <th>{{__('translation.cert')}}</th>
                        <th class="text-nowrap">{{__('translation.cert_description')}}</th>
                        <th>{{__('translation.data')}}</th>
                        <th>{{__('translation.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($enrolls as $enroll )
                        <tr>
                            @if ($enroll->pay == 1)
                            <td>{{__('translation.Paid')}}</td>
                            @else
                            <td>{{__('translation.not_Paid')}}</td>
                            @endif
                            <td>{{ $enroll->cert->cat->title }}</td>
                            <td>{{ $enroll->cert->title }}</td>
                            <td>{{ date('M j, Y', strtotime( $enroll->created_at)) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        @if ($enroll->pay == 0)
                                        <a class="dropdown-item"
                                        onclick=" if(confirm('{{__('confirm_pay')}}')){
                                            $('#pay{{ $enroll->id }}').submit()
                                       }">
                                            <i data-feather="pay" class="me-50"></i>
                                            <span>{{__('translation.cash_pay')}}</span>
                                    </a>
                                        @endif
                                        <a class="dropdown-item"
                                        onclick=" if(confirm('{{__('confirm_delete_cat')}}')){
                                            $('#delete{{ $enroll->id }}').submit()
                                       }">
                                            <i data-feather="trash" class="me-50"></i>
                                            <span>{{(__('translation.delete'))}}</span>
                                        </button>

                                        @if ($enroll->pay == 0)
                                        <form method="post" id="pay{{ $enroll->id }}" action="{{ route('admin.user.reverse.pay') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $enroll->id }}">
                                        </form>
                                        @endif
                                        <form method="post" id="delete{{ $enroll->id }}" action="{{ route('admin.user.reverse.delete') }}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $enroll->id }}">
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /Project table -->
    </div>
    <!--/ User Content -->
@endsection
