@extends('users.user')
@section('page')
    <!-- Project table -->
    <div class="card">
        <h4 class="card-header">{{__('translation.account')}}</h4>
        <div class="table-responsive">
            <table class="table datatable-project">
                <thead>
                <tr>
                    <th>NO.</th>
                    <th>{{__('translation.cert')}}</th>
                    <th class="text-nowrap">{{__('translation.Description')}}</th>
                    <th>{{__('translation.date')}}</th>
                    <th>{{__('translation.action')}}}</th>
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
                                    <a class="dropdown-item"  onclick="if(confirm('Are You Sure Delete this Organization')){
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
        <h4 class="card-header">{{__('translation.active_timeline')}}</h4>
        <div class="card-body pt-1">
            <ul class="timeline ms-50">
                <li class="timeline-item">
                    <span class="timeline-point timeline-point-indicator"></span>
                    <div class="timeline-event">
                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                            <h6>{{__('translation.user_login')}}</h6>
                            <span class="timeline-event-time me-1">{{ (int)((time()-strtotime($user->created_at))/3600) }} {{__('translation.hours ago')}}</span>
                        </div>
                        <p>{{__('translation.User login at')}} {{ date('M j, Y', strtotime($user->created_at)) }}</p>
                    </div>
                </li>
{{--                <li class="timeline-item">--}}
{{--                    <span class="timeline-point timeline-point-warning timeline-point-indicator"></span>--}}
{{--                    <div class="timeline-event">--}}
{{--                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">--}}
{{--                            <h6>User Reserve a Certificate</h6>--}}
{{--                            <span class="timeline-event-time me-1">45 min ago</span>--}}
{{--                        </div>--}}
{{--                        <p>React Project Certificate @10:15am</p>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="timeline-item">--}}
{{--                    <span class="timeline-point timeline-point-info timeline-point-indicator"></span>--}}
{{--                    <div class="timeline-event">--}}
{{--                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">--}}
{{--                            <h6>User make a review with react Certificate</h6>--}}
{{--                            <span class="timeline-event-time me-1">2 day ago</span>--}}
{{--                        </div>--}}
{{--                        <p>He Passed in review</p>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="timeline-item">--}}
{{--                    <span class="timeline-point timeline-point-danger timeline-point-indicator"></span>--}}
{{--                    <div class="timeline-event">--}}
{{--                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">--}}
{{--                            <h6>Create Invoices for client</h6>--}}
{{--                            <span class="timeline-event-time me-1">12 min ago</span>--}}
{{--                        </div>--}}
{{--                        <p class="mb-0">User take a new certificate in web development</p>--}}
{{--                        <div class="d-flex flex-row align-items-center mt-50">--}}
{{--                            <img class="me-1" src="app-assets/images/icons/pdf.png" alt="data.json" height="25" />--}}
{{--                            <h6 class="mb-0">web.pdf</h6>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
    <!-- /Activity Timeline -->
@endsection
