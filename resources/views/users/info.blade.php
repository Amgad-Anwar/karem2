@extends('users.user')
@section('page')


        <!-- Project table -->
        <h5 class="mt-3 mb-2">{{__('translation.Efficiency basis')}}</h5>
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h4 class="card-title">{{__('translation.edu_qualification')}}</h4>
                        <p class="card-text">{{ $user->education == null ?'This is Non-applicable': $user->education }}</p>
                        <a href="{{ $user->education == null ?'#': url('files/education',$user->education_file) }}" class="btn btn-outline-primary">{{__('translation.download')}}</a>
                        <a href="#" class="btn btn-outline-danger">{{__('translation.delete')}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h4 class="card-title">{{__('translation.sf_lang')}}</h4>
                        <p class="card-text">{{ $user['2nd_lang'] == null ? __('translation.Non-applicable'): $user['2nd_lang'] }}</p>
                        <a href="{{ $user['2nd_lang'] == null ?'#': url('files/lang2',$user['2nd_lang_file']) }}" class="btn btn-outline-primary">{{__('translation.download')}}</a>
                        <a href="#" class="btn btn-outline-danger">{{__('translation.delete')}}</a>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h4 class="card-title">{{__('translation.computer_skills')}}</h4>
                        <p class="card-text">{{ $user->computer_skills == null ? __('translation.Non-applicable') : $user->computer_skills }}</p>
                        <a href="{{ $user->computer_skills == null ?'#': url('files/computer-skills',$user->computer_skills_file) }}" class="btn btn-outline-primary">{{__('translation.download')}}</a>
                        <a href="#" class="btn btn-outline-danger">{{__('translation.delete')}}</a>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <div class="card text-center mb-3">
                    <div class="card-body">
                        <h4 class="card-title">{{__('translation.job')}}</h4>
                        <p class="card-text">{{ $user->job == null ? __('translation.Non-applicable'): $user->job }}</p>
                        <a href="{{ $user->job == null ?'#': url('files/job',$user->job_file) }}" class="btn btn-outline-primary">{{__('translation.download')}}</a>
                        <a href="#" class="btn btn-outline-danger">{{__('translation.delete')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Project table -->
        <!-- Activity Timeline -->
        <div class="card">
            <div style="text-align: center !important;" class="row">
                <h4 class="card-header">{{__('translation.applicant')}}</h4>
                <div class="d-flex justify-content-center pt-2">
                    <a style="width: 100%" href="javascript:;" class="btn btn-primary me-1"  data-bs-toggle="modal" data-bs-target="#default">
                        {{__('translation.add_new')}}
                    </a>
                </div>
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
                                                            <button
                                                                type="button"
                                                                onclick="if(confirm('{{__('translation.confirm_delete_applicant')}}')){
                                                                $('#delete{{ $usrapp->id }}').submit()
                                                                }"
                                                                class="btn btn-outline-danger">
                                                                {{__('translation.delete')}}
                                                            </button>
                                                            <form method="post" id="delete{{ $usrapp->id }}" action="{{ route('user.info.delete') }}">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $usrapp->id }}">
                                                            </form>
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
        <!-- /Activity Timeline -->
        <!--/ Edit User Modal -->
        <div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel1"> {{ __('translation.add_applicant') }} </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="post" action="{{ route('user.info.add') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="modal-body">
                            <div class="mb-1">
                                <label class="form-label" for="app"> {{__('translation.Self-Assessment')}}</label>
                                <select class="form-select" name="self-assessment" id="catapp">
                                    @foreach($app_cat as $appcat)
                                        <option value="{{$appcat->id}}">{{ $appcat->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="app">{{__('translation.Qualification')}}</label>
                                <select class="form-select" name="qualification" id="app">
                                   <option checked>select Qualification</option>
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{__('translation.Your Rating')}}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="rate" class="basic-ratings"></div>
                                        <input  id="rateinput" type="hidden" name="rating" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 mb-1 mb-sm-0">
                                <label for="formFile" class="form-label">{{__('translation.download')}}</label>
                                <input class="form-control" name='file' type="file" id="formFile" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{__('translation.save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
        $(document).ready(function() {

            // $("#breeds").attr('disabled', true);

            // check if selected
            if($("#catapp").find('option:selected').val() == 0) {
                $("#app").attr('disabled', true);
            }

            $('#catapp').change(function(){
                // get value of selected animal type
                var selected_app = $(this).find('option:selected').val();

                $.ajax({
                    url : "{{ route('user.info.getByCat','') }}/"+selected_app,
                    type:'GET',
                    dataType: 'json',
                    success: function(response) {
                        $("#app").attr('disabled', false);

                        //alert(response); // show [object, Object]

                        var $select = $('#app');

                        $select.find('option').remove();
                        $.each(response,function(key,value)
                        {
                            $select.append(value); // return empty
                        });
                    }
                });
            });
        });
    </script>
@endsection
@section('script')
    <script>
        $(function () {


            $("#rate").rateYo()
                .on("rateyo.set", function (e, data) {
                    $("#rateinput").val(data.rating);
                });

        });
        @foreach($user->applicant as $usrapp)

        $(document).ready(function() {
            $("#rate{{$usrapp->id}}").rateYo({
                rating: {{$usrapp->rating}},
            });
        });

        @endforeach
        @error('rating')
        toastr.warning('<br><br><br> {{ $message }}')
        @enderror
        @error('file')
        toastr.warning('<br><br><br> {{ $message }}')
        @enderror
        @error('self-assessment')
        toastr.warning('<br> <br><br> {{ $message }}')
        @enderror
        @error('qualification')
        toastr.warning('<br> <br><br> {{ $message }}')
        @enderror
        @if ( session('alert') )
        toastr.error('{{ session('alert')}}')
        @endif
        @if ( session('success') )
        toastr.success('{{ session('alert') }}')
        @endif
    </script>
@endsection
