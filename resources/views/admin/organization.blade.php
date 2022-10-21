@extends('layouts.admin')
@section('add')
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
{{__('translation.add_organizer')}}
    </button>
@endsection
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="row">
            @foreach($organizations as $organization)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card card-profile">
                        <img src="{{ asset('asset/admin') }}/images/banner/banner-12.jpg" class="img-fluid card-img-top" alt="Profile Cover Photo"/>
                        <div class="card-body">
                            <div class="profile-image-wrapper">
                                <div class="profile-image">
                                    <div class="avatar">
                                        <img src="{{ url("image/organization/").'/'.$organization->image_file }}" alt="Profile Picture" />
                                    </div>
                                </div>
                            </div>
                            <h3>{{ $organization->name }}</h3>
                            <h6 class="text-muted">{{__('translation.organizer')}}</h6>
                            <span class="badge badge-light-primary profile-badge">{{ $organization->role }}</span>
                            <hr class="mb-2" />
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editForm{{ $organization->id }}">
                                {{__('translation.edit')}}
                            </button>
                            <button type="button"
                                    onclick="if(confirm('{{__('translation.confirm_delete_org')}}')){
                                        $('#delete{{ $organization->id }}').submit()
                                    }"
                                    class="btn btn-outline-danger">
                                {{__('translation.delete')}}
                            </button>
                            <form method="post" id="delete{{ $organization->id }}" action="{{ route('organization.delete') }}">
                               @csrf
                                <input type="hidden" name="id" value="{{ $organization->id }}">
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade text-start" id="editForm{{ $organization->id }}" tabindex="-1" aria-labelledby="myModalLabel4" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel4">{{__('translation.edit_organizer')}}</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('organization.edit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $organization->id }}">
                                <div class="modal-body">
                                    <div class="mb-1 mb-sm-0">
                                        <label for="formFile3" class="form-label">{{__('translation.upload_organizer_photo')}}</label>
                                        <input class="form-control" name="image" type="file" id="formFile3" />
                                    </div>
                                    <label>{{__('translation.organizer_name')}} </label>
                                    <div class="mb-1">
                                        <input type="text" name="name" value="{{ $organization->name }}" class="form-control" />
                                    </div>
                                    <label>{{__('translation.organizer_jop ')}} </label>
                                    <div class="mb-1">
                                        <input type="text" name="job" value="{{ $organization->role }}" class="form-control" />
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
    </div>


@endsection
@section('modal')

    <!-- Modal Add -->
    <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">{{__('translation.add_organizer')}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('organization.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-1 mb-sm-0">
                            <label for="formFile" class="form-label">{{__('translation.upload_organizer_photo')}}</label>
                            <input class="form-control" name="image" type="file" id="formFile" />
                        </div>
                        <label>{{__('translation.organizer_name')}} </label>
                        <div class="mb-1">
                            <input type="text" name="name" placeholder="name" class="form-control" />
                        </div>
                        <label>{{__('translation.organizer_jop ')}} </label>
                        <div class="mb-1">
                            <input type="text" name="job" placeholder="jop" class="form-control" />
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
        toastr.warning('{{ $message }}',"👋 UPI Academy")
        @enderror
        @error('name')
        toastr.warning('{{ $message }}',"👋 UPI Academy")
        @enderror
        @error('job')
        toastr.warning('{{ $message }}',"👋 UPI Academy")
        @enderror
        @if ( session('alert') )
        toastr.error('{{ session('alert')}}',"👋 UPI Academy")
        @endif
        @if ( session('Success') )
        toastr.success('{{ session('Success') }}',"👋 UPI Academy")
        @endif
    </script>

@endsection
