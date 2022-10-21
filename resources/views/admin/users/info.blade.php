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
                <a class="nav-link " href="{{ route('admin.user.view',$user->id) }}">
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
                <a class="nav-link active" href="{{ route('admin.user.info',$user->id) }}">
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
        <h5 class="mt-3 mb-2">{{__('translation.Efficiency basis')}}</h5>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h4 class="card-title">{{__('translation.edu_qualification')}}</h4>
                        <p class="card-text">{{ $user->education == null ?'This is Non-applicable': $user->education }}</p>
                        <a href="{{ $user->education == null ?'#': url('files/education',$user->education_file) }}" class="btn btn-outline-primary">{{__('translation.download')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h4 class="card-title">{{__('translation.sf_lang')}}</h4>
                        <p class="card-text">{{ $user['2nd_lang'] == null ?'This is Non-applicable': $user['2nd_lang'] }}</p>
                        <a href="{{ $user['2nd_lang'] == null ?'#': url('files/lang2',$user['2nd_lang_file']) }}" class="btn btn-outline-primary">{{__('translation.download')}}</a>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h4 class="card-title">{{__('translation.computer_skills')}}</h4>
                        <p class="card-text">{{ $user->computer_skills == null ?'This is Non-applicable': $user->computer_skills }}</p>
                        <a href="{{ $user->computer_skills == null ?'#': url('files/computer-skills',$user->computer_skills_file) }}" class="btn btn-outline-primary">{{__('translation.download')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h4 class="card-title">{{__('translation.job')}}</h4>
                        <p class="card-text">{{ $user->job == null ?'This is Non-applicable': $user->job }}</p>
                        <a href="{{ $user->job == null ?'#': url('files/job',$user->job_file) }}" class="btn btn-outline-primary">{{__('translation.download')}}</a>

                    </div>
                </div>
            </div>
        </div>
        <!-- /Project table -->

        <div class="card">
            <div style="text-align: center !important;" class="row">
                <h4 class="card-header">{{__('translation.applicant')}}</h4>
            </div>
            <div class="card-body pt-1">
                <ul class="timeline ms-50">
                    @foreach($app_cat as $appcat)
                        <li class="timeline-item">
                            <span class="timeline-point timeline-point-indicator"></span>
                            <div class="timeline-event">
                                <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                    <h6>{{ $appcat->title }}</h6>
                                </div>
                                <div class="row">
                                    @foreach($appcat->applicant as $applicant)
                                        @foreach($user->applicant as $usrapp)
                                            @if($usrapp->applicant_id == $applicant->id )
                                                <div class="col-md-6 col-lg-6">
                                                    <div style="background-color: #1600ff70" class="card text-center mb-3">
                                                        <div class="card-body">
                                                            <h4 class="card-title">{{ $applicant->title }}</h4>
                                                            <div class="card-body text-center">
                                                                <div class="read-only-ratings" id="rate{{$usrapp->id}}" data-rateyo-read-only="true"></div>
                                                            </div>
                                                            <a href="{{ url('files/Applicant',$usrapp->file) }}" class="btn btn-outline-primary">{{__('translation.download')}}</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>

    </div>
    <!--/ User Content -->
@endsection
