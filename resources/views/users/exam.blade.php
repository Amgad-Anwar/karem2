@extends('users.user')
@section('page')


    <!-- Project table -->
    <div class="row">
        @foreach($user->exam as $exam)
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header py-2">
                        <ul class="nav nav-pills card-header-pills ms-0" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home{{ $exam->id }}" role="tab" aria-controls="pills-home" aria-selected="true">{{__('translation.data')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile{{ $exam->id }}" role="tab" aria-controls="pills-profile" aria-selected="false">{{__('translation.subject')}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home{{ $exam->id }}" role="tabpanel" aria-labelledby="pills-home-tab">
                                <h4 class="card-title">{{ $exam->title }}</h4>
                                <p class="card-text">{{__('translation.Exam Date')}} : {{ $exam->date }}</p>
                                <p class="card-text">{{__('translation.Subject Numbers')}} : {{ count($exam->subject) }}</p>
                            </div>
                            <div class="tab-pane fade" id="pills-profile{{ $exam->id }}" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="row">
                                    @foreach($exam->subject as $subject)
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <div class="card card-profile">
                                                <img src="{{ asset('asset/users')}}/images/banner/banner-12.jpg" class="img-fluid card-img-top" alt="Profile Cover Photo"/>
                                                <div class="card-body">
                                                    <h3>{{ $subject->title }}</h3>
                                                    @if($subject->score > 50)
                                                        <h6 class="text-success">{{__('translation.success')}}</h6>
                                                        <span class="badge badge-light-primary profile-badge">{{ $subject->score }}/100</span>
                                                        <hr class="mb-2" />
                                                    @else
                                                        @if($subject->return == 0 && $subject->review == 0)

                                                            <h6 class="text-danger">{{__('translation.fail')}}</h6>
                                                            <span class="badge badge-light-primary profile-badge">{{ $subject->score }}/100</span>
                                                            <hr class="mb-2" />

                                                            <button type="button"
                                                                    onclick="if(confirm('{{__('confirm_request_grievance')}}')){
                                                                        $('#review{{ $subject->id }}').submit()
                                                                        }"
                                                                    class="btn btn-outline-success">
                                                                {{__('translation.request_grievance')}}

                                                            </button>
                                                            <button type="button"
                                                                    onclick="if(confirm('{{__('confirm_request_return')}}')){
                                                                        $('#return{{ $subject->id }}').submit()
                                                                        }"
                                                                    class="btn btn-outline-danger">
                                                                {{__('translation.Re-examination')}}
                                                            </button>

                                                            <form method="post" id="review{{ $subject->id }}" action="{{ route('user.subject.review') }}">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $subject->id }}">
                                                            </form>
                                                            <form method="post" id="return{{ $subject->id }}" action="{{ route('user.subject.return') }}">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $subject->id }}">
                                                            </form>

                                                        @elseif($subject->return == 1)
                                                            <h6 class="text-muted">{{__('translation.fail')}}</h6>
                                                            <h6 class="text-danger">{{__('translation.alert_request_review')}}</h6>
                                                            <span class="badge badge-light-primary profile-badge">{{ $subject->score }}/100</span>
                                                            <hr class="mb-2" />
                                                            <button style="margin-top: 10px" type="button" class="btn btn-outline-danger" disabled>
                                                                {{__('translation.request')}}
                                                            </button>
                                                        @elseif($subject->review == 1)
                                                            <h6 class="text-muted">{{__('translation.fail')}}</h6>
                                                            <h6 class="text-danger">{{__('translation.alert_request_review')}}</h6>
                                                            <span class="badge badge-light-primary profile-badge">{{ $subject->score }}/100</span>
                                                            <hr class="mb-2" />
                                                            <button style="margin-top: 10px" type="button" class="btn btn-outline-success" disabled>
                                                                {{__('translation.request')}}
                                                            </button>

                                                        @elseif($subject->return == 2)
                                                            <h6 class="text-danger">{{__('translation.non_accept')}}</h6>
                                                            <span class="badge badge-light-primary profile-badge">{{ $subject->score }}/100</span>
                                                            <hr class="mb-2" />
                                                        @elseif($subject->review == 2)
                                                            <h6 class="text-danger">{{__('translation.non_accept')}}</h6>
                                                            <span class="badge badge-light-primary profile-badge">{{ $subject->score }}/100</span>
                                                            <hr class="mb-2" />
                                                        @elseif($subject->return == 3)
                                                            <h6 class="text-success">{{__('translation.accept_return')}}</h6>
                                                            <span class="badge badge-light-primary profile-badge">{{ $subject->score }}/100</span>
                                                            <hr class="mb-2" />
                                                        @elseif($subject->review == 3)
                                                            <h6 class="text-success">{{__('translation.accept_review')}}</h6>
                                                            <span class="badge badge-light-primary profile-badge">{{ $subject->score }}/100</span>
                                                            <hr class="mb-2" />
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-outline-success" disabled>
                                    {{__('translation.congratulation')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- /Project table -->
@endsection
