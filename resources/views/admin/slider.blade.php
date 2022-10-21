@extends('layouts.admin')
@section('add')
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
        {{__('translation.add_slider')}}
    </button>
@endsection
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="row">
            @foreach( $sliders as $slider)
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-header py-2">
                            <ul class="nav nav-pills card-header-pills ms-0" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home{{ $slider->id }}" role="tab" aria-controls="pills-home" aria-selected="true">{{__('translation.data')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile{{ $slider->id }}" role="tab" aria-controls="pills-profile" aria-selected="false">{{__('translation.page')}}</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home{{ $slider->id }}" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <h4 class="card-title">{{ $slider->title }}</h4>
                                    <p class="card-text">{{ $slider->description }}</p>
                                    <form method="post" id="delete{{ $slider->id }}" action="{{ route('slider.delete') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $slider->id }}">
                                    </form>
                                    <button type="button"
                                       onclick=" if(confirm('{{__('translation.confirm_delete_advisory')}}')){
                                            $('#delete{{ $slider->id }}').submit()
                                       }"
                                       class="btn btn-outline-danger">{{ __('translation.delete') }}</button>
                                    <a href="#" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editform{{ $slider->id }}">{{__('translation.edit')}}</a>
                                </div>

                                <!-- Modal edit Advisory-->
                                <div class="modal fade text-start" id="editform{{ $slider->id }}" tabindex="-1" aria-labelledby="myModalLabel32" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel32">{{__('translation.edit_slider')}}</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('slider.edit') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $slider->id }}">
                                                <div class="modal-body">
                                                    <label>{{__('translation.advisory_title')}} </label>
                                                    <div class="mb-1">
                                                        <input type="text" name="title" value="{{ $slider->title }}" class="form-control" />
                                                    </div>
                                                    <label>{{__('translation.advisory_description')}} </label>
                                                    <div class="mb-1">
                                                        <input type="text" name="description" value="{{ $slider->description }}" class="form-control" />
                                                    </div>
                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{__('translation.save')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="pills-profile{{ $slider->id }}" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row justify-content-md-center justify-content-sm-center">
                                        @foreach( $slider->page as $page)
                                        <div class="col-md-9 col-lg-9">
                                            <div class="card single-promo-card single-promo-hover text-center">
                        <div class="card-body">
                            <div class="pt-2 pb-3">
                                <h5 style="font-family: 'Frutiger LT Std', sans-serif !important;">{{ $page->title }} </h5>
                                <p class="mb-0">{{ $page->description }} </p>
                                <hr class="mb-2" />
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editForm{{ $page->id }}">
                                    {{ __('translation.edit') }}
                                </button>
                                <button type="button"
                                        onclick="if(confirm('{{__('translation.confirm_delete_advisory_member')}}')){
                                            $('#delete{{ $page->id }}').submit()
                                            }"
                                        class="btn btn-outline-danger">
                                    {{__('translation.delete')}}
                                </button>
                                <form method="post" id="delete{{ $page->id }}" action="{{ route('slider.page.delete') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $page->id }}">
                                </form>
                            </div>
                        </div>
                    </div>
                                         </div>
                                        <div class="modal fade text-start" id="editForm{{ $page->id }}" tabindex="-1" aria-labelledby="myModalLabel4" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel4">{{__('translation.edit_organizer')}}</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('slider.page.edit') }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $page->id }}">
                                                            <div class="modal-body">
                                                                <div class="mb-1 mb-sm-0">
                                                                    <label for="formFile3" class="form-label">{{__('translation.upload_organizer_photo')}}</label>
                                                                    <input class="form-control" name="image" type="file" id="formFile3" />
                                                                </div>
                                                                <label>{{__('translation.organizer_name')}}</label>
                                                                <div class="mb-1">
                                                                    <input type="text" name="name" value="{{ $page->title }}" class="form-control" />
                                                                </div>
                                                                <label>{{__('translation.organizer_jop ')}}</label>
                                                                <div class="mb-1">
                                                                    <input type="text" name="job" value="{{ $page->description }}" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                                                    {{ __('translation.save') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>

                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm{{ $slider->id }}">
                                    {{__('translation.Add Page')}}
                                    </button>

                                    <div class="modal fade text-start" id="inlineForm{{ $slider->id }}" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel3">{{__('translation.Add new Member')}}</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('slider.page.add') }}" method="post" enctype="multipart/form-data">
                                                   @csrf
                                                    <input type="hidden" name="slider_id" value="{{ $slider->id }}">
                                                    <div class="modal-body">
                                                        <label>{{ __('translation.page_title') }} </label>
                                                        <div class="mb-1">
                                                            <input type="text" placeholder="title" name="title" class="form-control" />
                                                        </div>
                                                        <label>{{__('translation.Member Jop')}} </label>
                                                        <div class="mb-1">
                                                            <input type="text" placeholder="description" name="description" class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                                            {{__('translation.save')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            

                            </div>
                        </div>
                    </div>
                </div>
           @endforeach
        </div>

    </div>
@endsection

@section('modal')
    <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">{{ __('translation.Add new Advisory') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('slider.add') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label>{{__('Advisory Title')}} </label>
                        <div class="mb-1">
                            <input type="text" name="title" placeholder="title" class="form-control" />
                        </div>
                        <label>{{__('translation.Advisory Description')}} </label>
                        <div class="mb-1">
                            <input type="text" name="description" placeholder="description" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{__('translation.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        @error('image')
        toastr.warning('<br><br><br> {{ $message }}')
        @enderror
        @error('name')
        toastr.warning('<br><br><br> {{ $message }}')
        @enderror
        @error('job')
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
