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
                <a class="nav-link active" href="{{ route('admin.user.view',$user->id) }}">
                    <i data-feather="user" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">{{__('translation.account')}}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.certificate',$user->id) }}">
                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">{{__('translation.cert')}}</span>
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
                <a class="nav-link" href="{{ route('admin.user.reverse',$user->id) }}">
                    <i data-feather="link" class="font-medium-3 me-50"></i><span class="fw-bold">{{__('translation.user_reservation')}}</span>
                </a>
            </li>
        </ul>
        <!--/ User Pills -->

        <!-- Project table -->
        <div class="card">
            <h4 class="card-header">{{__('translation.user_cert')}}</h4>
            <div class="table-responsive">
                <table class="table datatable-project">
                    <thead>
                    <tr>
                        <th>NO.</th>
                        <th>{{__('translation.cert')}}</th>
                        <th class="text-nowrap">{{__('translation.cert_description')}}</th>
                        <th>{{__('validation.date')}}</th>
                        <th>{{__('translation.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->last_certificate as $certificate)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $certificate->title }}</td>
                            <td>{{ $certificate->description }}</td>
                            <td>{{ $certificate->date }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{ url('file/certificate',$certificate->file) }}">
                                            <i data-feather="download" class="me-50"></i>
                                            <span>{{__('translation.download')}}</span>
                                        </a>
                                        <a class="dropdown-item"  onclick="if(confirm('{{__('translation.confirm_delete_cert')}}')){
                                            $('#delete{{ $certificate->id }}').submit()
                                            }">
                                            <i data-feather="trash" class="me-50"></i>
                                            <span>{{__('translation.delete')}}</span>
                                        </a>
                                    </div>
                                </div>
                                <form method="post" id="delete{{ $certificate->id }}" action="{{ route('admin.users.last.certificate.delete') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $certificate->id }}">
                                </form>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /Project table -->

        <!-- Activity Timeline -->
        <div class="card">
            <h4 class="card-header">User Activity Timeline</h4>
            <div class="card-body pt-1">
                <ul class="timeline ms-50">
                    <li class="timeline-item">
                        <span class="timeline-point timeline-point-indicator"></span>
                        <div class="timeline-event">
                            <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                <h6>{{__('translation.User_login')}}n</h6>
                                <span class="timeline-event-time me-1">{{ (int)((time()-strtotime($user->created_at))/3600) }} {{__('translation.hours ago')}}</span>
                            </div>
                            <p>{{__('translation.User login at')}} {{ date('M j, Y', strtotime($user->created_at)) }}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /Activity Timeline -->
    </div>
    <!--/ User Content -->
@endsection
