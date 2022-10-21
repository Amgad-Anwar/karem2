@extends('admin.users.view')
@section('add')
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
        Add Exam Result
    </button>
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
                    <span class="fw-bold">{{__('translation.cert')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.user.exam',$user->id) }}">
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
                    <i data-feather="link" class="font-medium-3 me-50"></i><span class="fw-bold">{{__('translation.user_reservation') }}</span>
                </a>
            </li>
        </ul>
        <!--/ User Pills -->

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
                                    <p class="card-text"> {{__('translation.exam_date')}} : {{ $exam->date }}</p>
                                    <p class="card-text"> {{__('translation.subject_number')}} : {{ count($exam->subject) }}</p>
                                    <button type="button"
                                            onclick="if(confirm('{{__('translation.confirm_delete_exam')}}')){
                                                $('#delete{{ $exam->id }}').submit()
                                                }"
                                            class="btn btn-outline-danger">
                                        Delete
                                    </button>
                                    <a href="#" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editexam{{ $exam->id }}">{{__('translation.edit')}}</a>
                                    <form method="post" id="delete{{ $exam->id }}" action="{{ route('admin.user.exam.delete') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $exam->id }}">
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="pills-profile{{ $exam->id }}" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row">
                                        @foreach($exam->subject as $subject)
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="card card-profile">
                                                    <img src="{{ asset('asset/admin')}}/images/banner/banner-12.jpg" class="img-fluid card-img-top" alt="Profile Cover Photo"/>
                                                    <div class="card-body">
                                                        <h3>{{ $subject->title }}</h3>
                                                        @if($subject->score >50)
                                                            <h6 class="text-success">{{__('translation.success')}}</h6>
                                                            <span class="badge badge-light-primary profile-badge">{{ $subject->score }}/100</span>

                                                        @else
                                                            <h6 class="text-danger">{{__('translation.fail')}}</h6>
                                                            <span class="badge badge-light-danger profile-badge">{{ $subject->score }}/100</span>
                                                            @if($subject->return == 1)
                                                                <h6 class="text-danger">{{__('translation.student_need_return')}}</h6>
                                                                <button type="button"
                                                                        onclick="if(confirm('{{__('translation.confirm_accept_return')}}')){
                                                                            $('#acceptreturn{{ $subject->id }}').submit()
                                                                            }"
                                                                        class="btn btn-outline-success">
                                                                    {{__('translation.yes')}}
                                                                </button>
                                                                <button type="button"
                                                                        onclick="if(confirm('{{__('translation.confirm_refuse_return')}}')){
                                                                            $('#refusereturn{{ $subject->id }}').submit()
                                                                            }"
                                                                        class="btn btn-outline-danger">
                                                                    {{__('translation.no')}}
                                                                </button>

                                                                <form method="post" id="acceptreturn{{ $subject->id }}" action="{{ route('admin.subject.return.accept') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $subject->id }}">
                                                                </form>
                                                                <form method="post" id="refusereturn{{ $subject->id }}" action="{{ route('admin.subject.return.refuse') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $subject->id }}">
                                                                </form>
                                                            @endif
                                                            @if($subject->review == 1)
                                                                <h6 class="text-info">Student Wanted to file a grievance{{__('translation.student_want_review')}}</h6>
                                                                <button type="button"
                                                                        onclick="if(confirm('{{__('translation.confirm_accept_review')}}')){
                                                                            $('#accept{{ $subject->id }}').submit()
                                                                            }"
                                                                        class="btn btn-outline-success">
                                                                    {{__('translation.yes')}}

                                                                </button>
                                                                <button type="button"
                                                                        onclick="if(confirm('{{__('translation.confirm_refuse_review')}}')){
                                                                            $('#refuse{{ $subject->id }}').submit()
                                                                            }"
                                                                        class="btn btn-outline-danger">
                                                                    {{__('translation.no')}}

                                                                </button>

                                                                <form method="post" id="accept{{ $subject->id }}" action="{{ route('admin.subject.review.accept') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $subject->id }}">
                                                                </form>
                                                                <form method="post" id="refuse{{ $subject->id }}" action="{{ route('admin.subject.review.refuse') }}">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{ $subject->id }}">
                                                                </form>
                                                            @endif


                                                        @endif
                                                        <hr class="mb-2" />
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editsubject{{ $subject->id }}">
                                                            {{__('translation.edit')}}
                                                        </button>
                                                        <button type="button"
                                                                onclick="if(confirm('{{__('translation.confirm_delete_subject')}}')){
                                                                    $('#delete{{ $subject->id }}').submit()
                                                                    }"
                                                                class="btn btn-outline-danger">
                                                            {{__('translation.delete')}}
                                                        </button>
                                                        <form method="post" id="delete{{ $subject->id }}" action="{{ route('admin.user.subject.delete') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $subject->id }}">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade text-start" id="editsubject{{ $subject->id }}" tabindex="-1" aria-labelledby="myModalLabel4" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel4">{{__('translation.Edit Subject')}}</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="post" action="{{ route('admin.user.subject.edit') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $subject->id }}">
                                                            <div class="modal-body">
                                                                <label>{{__('translation.Subject Name')}} </label>
                                                                <div class="mb-1">
                                                                    <input type="text" name="title" value="{{ $subject->title }}" class="form-control" />
                                                                </div>
                                                                <label>{{__('translation.Subject Grade')}} </label>
                                                                <div class="mb-1">
                                                                    <input type="number" name="score" value="{{ $subject->score }}" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{__('translation.save')}}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addsubject{{ $exam->id }}">
                                        {{__('translation.Add Subject')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade text-start" id="addsubject{{ $exam->id }}" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel3">{{__('translation.Add new Subject')}}</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ route('admin.user.subject.add') }}">
                                @csrf
                                <input type="hidden" name="exam_id" value="{{ $exam->id }}">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="modal-body">
                                    <label>{{__('translation.Subject Name')}} </label>
                                    <div class="mb-1">
                                        <input type="text" name="title" placeholder="name" class="form-control" />
                                    </div>
                                    <label>{{__('translation.Subject Grade')}}</label>
                                    <div class="mb-1">
                                        <input type="number" name="score" max="100" min="0" placeholder="garde" class="form-control" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{__('translation.save')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            {{--  edit exam --}}
                <div class="modal fade text-start" id="editexam{{ $exam->id }}" tabindex="-1" aria-labelledby="myModalLabel32" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel32">{{__('translation.Edit Exam Result')}}</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ route('admin.user.exam.edit') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $exam->id }}">
                                <div class="modal-body">
                                    <label>{{__('translation.name')}} </label>
                                    <div class="mb-1">
                                        <input type="text" name="title" value="{{ $exam->title }}" class="form-control" />
                                    </div>
                                    <label>{{__('translation.Exam Date')}} </label>
                                    <div class="mb-1">
                                        <input type="date" name="date" value="{{ $exam->title }}" class="form-control" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{__('translation.save')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        <!-- /Project table -->
    </div>
    <!--/ User Content -->


    <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">{{__('translation.Add Exam Result')}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('admin.user.exam.add') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="modal-body">
                        <label>{{__('translation.name')}} </label>
                        <div class="mb-1">
                            <input type="text" name="title" placeholder="name" class="form-control" />
                        </div>
                        <label>{{__('translation.Exam Date')}} </label>
                        <div class="mb-1">
                            <input type="date" name="date" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{__('translation.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
