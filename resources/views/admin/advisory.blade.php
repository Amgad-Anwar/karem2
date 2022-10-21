@extends('layouts.admin')
@section('add')
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
        {{__('translation.add_advisory')}}
    </button>
@endsection
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="row">
            @foreach( $advisories as $advisory)
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-header py-2">
                            <ul class="nav nav-pills card-header-pills ms-0" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home{{ $advisory->id }}" role="tab" aria-controls="pills-home" aria-selected="true">{{__('translation.data')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile{{ $advisory->id }}" role="tab" aria-controls="pills-profile" aria-selected="false">{{__('translation.member')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-blog{{ $advisory->id }}" role="tab" aria-controls="pills-profile" aria-selected="false">{{__('translation.blog')}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home{{ $advisory->id }}" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <h4 class="card-title">{{ $advisory->title }}</h4>
                                    <p class="card-text">{{ $advisory->description }}</p>
                                    <form method="post" id="delete{{ $advisory->id }}" action="{{ route('advisory.delete') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $advisory->id }}">
                                    </form>
                                    <button type="button"
                                       onclick=" if(confirm('{{__('translation.confirm_delete_advisory')}}')){
                                            $('#delete{{ $advisory->id }}').submit()
                                       }"
                                       class="btn btn-outline-danger">{{ __('translation.delete') }}</button>
                                    <a href="#" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editform{{ $advisory->id }}">{{__('translation.edit')}}</a>
                                </div>

                                <!-- Modal edit Advisory-->
                                <div class="modal fade text-start" id="editform{{ $advisory->id }}" tabindex="-1" aria-labelledby="myModalLabel32" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel32">{{__('translation.edit_advisory')}}</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('advisory.edit') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $advisory->id }}">
                                                <div class="modal-body">
                                                    <label>{{__('translation.advisory_title')}} </label>
                                                    <div class="mb-1">
                                                        <input type="text" name="title" value="{{ $advisory->title }}" class="form-control" />
                                                    </div>
                                                    <label>{{__('translation.advisory_description')}} </label>
                                                    <div class="mb-1">
                                                        <input type="text" name="description" value="{{ $advisory->description }}" class="form-control" />
                                                    </div>
                                                    <label>{{__('translation.board Type')}}</label>
                                                    <div class=mb-1>
                                                        <select name="type" class="form-control">
                                                            <option value="accreditation">{{__('translation.accreditation')}}</option>
                                                            <option value="advisory">{{__('translation.advisory')}}</option>
                                                            <option value="neutrality">{{__('translation.neutrality')}}</option>
                                                            <option value="export">{{__('translation.export')}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{__('translation.save')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="tab-pane fade" id="pills-profile{{ $advisory->id }}" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row">
                                        @foreach( $advisory->member as $member)
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="card card-profile">
                                                    <img src="{{ asset('asset/admin') }}/images/banner/banner-12.jpg" class="img-fluid card-img-top" alt="Profile Cover Photo"/>
                                                    <div class="card-body">
                                                        <div class="profile-image-wrapper">
                                                            <div class="profile-image">
                                                                <div class="avatar">
                                                                    <img src="{{ url("image/advisorymember/").'/'.$member->image_file }}" alt="Profile Picture" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h3>{{ $member->name }}</h3>
                                                        <h6 class="text-muted">{{__('translation.organizer')}}</h6>
                                                        <span class="badge badge-light-primary profile-badge">{{ $member->role }}</span>
                                                        <hr class="mb-2" />
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editForm{{ $member->id }}">
                                                            {{ __('translation.edit') }}
                                                        </button>
                                                        <button type="button"
                                                                onclick="if(confirm('{{__('translation.confirm_delete_advisory_member')}}')){
                                                                    $('#delete{{ $member->id }}').submit()
                                                                    }"
                                                                class="btn btn-outline-danger">
                                                            {{__('translation.delete')}}
                                                        </button>
                                                        <form method="post" id="delete{{ $member->id }}" action="{{ route('advisory.member.delete') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $member->id }}">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade text-start" id="editForm{{ $member->id }}" tabindex="-1" aria-labelledby="myModalLabel4" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel4">{{__('translation.edit_organizer')}}</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('advisory.member.edit') }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $member->id }}">
                                                            <div class="modal-body">
                                                                <div class="mb-1 mb-sm-0">
                                                                    <label for="formFile3" class="form-label">{{__('translation.upload_organizer_photo')}}</label>
                                                                    <input class="form-control" name="image" type="file" id="formFile3" />
                                                                </div>
                                                                <label>{{__('translation.organizer_name')}}</label>
                                                                <div class="mb-1">
                                                                    <input type="text" name="name" value="{{ $member->name }}" class="form-control" />
                                                                </div>
                                                                <label>{{__('translation.organizer_jop ')}}</label>
                                                                <div class="mb-1">
                                                                    <input type="text" name="job" value="{{ $member->role }}" class="form-control" />
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

                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm{{ $advisory->id }}">
                                    {{__('translation.Add Organizer')}}
                                    </button>

                                    <div class="modal fade text-start" id="inlineForm{{ $advisory->id }}" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel3">{{__('translation.Add new Member')}}</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('advisory.member.add') }}" method="post" enctype="multipart/form-data">
                                                   @csrf
                                                    <input type="hidden" name="advisory_id" value="{{ $advisory->id }}">
                                                    <div class="modal-body">
                                                        <div class="mb-1 mb-sm-0">
                                                            <label for="formFile2" class="form-label">{{__('translation.Upload Member Photo')}}</label>
                                                            <input class="form-control" name="image" type="file" id="formFile2" />
                                                        </div>
                                                        <label>{{ __('translation.Member Name') }} </label>
                                                        <div class="mb-1">
                                                            <input type="text" placeholder="name" name="name" class="form-control" />
                                                        </div>
                                                        <label>{{__('translation.Member Jop')}} </label>
                                                        <div class="mb-1">
                                                            <input type="text" placeholder="jop" name="job" class="form-control" />
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
                                <div class="tab-pane fade" id="pills-blog{{ $advisory->id }}" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="row">
                                        @foreach( $advisory->blog as $blog)
                                            <div class="col-lg-4 col-md-6 col-12">
                                                <div class="card card-profile">
                                                    <img src="{{ url($blog->cover)}}" class="img-fluid card-img-top" alt="Profile Cover Photo"/>
                                                    <div class="card-body">

                                                        <h3>{{ $blog->title }}</h3>
                                                        <hr class="mb-2" />
                                                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editFormblog{{ $blog->id }}">
                                                            {{ __('translation.edit') }}
                                                        </button>
                                                        <button type="button"
                                                                onclick="if(confirm('{{__('translation.confirm_delete_advisory_blog')}}')){
                                                                    $('#deleteblog{{ $blog->id }}').submit()
                                                                    }"
                                                                class="btn btn-outline-danger">
                                                            {{__('translation.delete')}}
                                                        </button>
                                                        <form method="post" id="deleteblog{{ $blog->id }}" action="{{ route('advisory.member.delete') }}">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $blog->id }}">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade text-start" id="editFormblog{{ $blog->id }}" tabindex="-1" aria-labelledby="myModalLabel4" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel4">{{__('translation.edit_blog')}}</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('advisory.blog.edit') }}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $blog->id }}">
                                                            <div class="modal-body">
                                                                <div class="mb-1 mb-sm-0">
                                                                    <label for="formFile3" class="form-label">{{__('translation.upload_blog_photo')}}</label>
                                                                    <input class="form-control" name="cover" type="file" id="formFile3" />
                                                                </div>
                                                                <label>{{__('translation.blog_title')}}</label>
                                                                <div class="mb-1">
                                                                    <input type="text" name="title" value="{{ $blog->title }}" class="form-control" />
                                                                </div>
                                                                <label>{{__('translation.blog_description')}}</label>
                                                                <div class="mb-1">
                                                                    <textarea name="description"  class="form-control">
                                                                        {{$blog->description }}
                                                                    </textarea>
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

                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineFormBlog{{ $advisory->id }}">
                                        {{__('translation.Add Blog')}}
                                    </button>

                                    <div class="modal fade text-start" id="inlineFormBlog{{ $advisory->id }}" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel3">{{__('translation.Add new Member')}}</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('advisory.blog.add') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="advisory_id" value="{{ $advisory->id }}">
                                                    <div class="modal-body">
                                                        <div class="mb-1 mb-sm-0">
                                                            <label for="formFile2" class="form-label">{{__('translation.BlogPhoto')}}</label>
                                                            <input class="form-control" name="cover" type="file" id="formFile2" />
                                                        </div>
                                                        <label>{{ __('translation.blog_title') }} </label>
                                                        <div class="mb-1">
                                                            <input type="text" placeholder="Blog title" name="title" class="form-control" />
                                                        </div>
                                                        <label>{{__('translation.blog_description')}} </label>
                                                        <div class="mb-1">
                                                            <textarea class="form-control" name="description"></textarea>
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
                <form action="{{ route('advisory.add') }}" method="post">
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
                        <label>{{__('translation.board Type')}}</label>
                        <div class=mb-1>
                            <select name="type" class="form-control">
                                <option value="accreditation">{{__('translation.accreditation')}}</option>
                                <option value="advisory">{{__('translation.advisory')}}</option>
                                <option value="neutrality">{{__('translation.neutrality')}}</option>
                                <option value="export">{{__('translation.export')}}</option>
                            </select>
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
