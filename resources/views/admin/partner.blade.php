@extends('layouts.admin')
@section('add')
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
        {{__('translation.add_partner')}}
    </button>
@endsection
@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="row">
            @foreach( $partners as $partner )
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center mb-3">
                        <div class="card-body">
                            <img style="width: 230px;height: 172px" src="{{  url("image/partner/").'/'.$partner->image_file }} ">
                            <h4 class="card-title">{{ $partner->name }}</h4>
                            <p class="card-text">{{ $partner->description }}</p>
                            <a href="{{ $partner->link }}" class="btn btn-outline-primary">{{__('translation.link')}}</a>
                            <hr class="mb-2" />
                            <div>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editform{{ $partner->id }}">
                                    {{__('translation.edit')}}
                                </button>
                                <button type="button"
                                        onclick="if(confirm('{{__('translation.confirm_delete_part')}}')){
                                            $('#delete{{ $partner->id }}').submit()
                                            }"
                                        class="btn btn-outline-danger">
                                    {{__('translation.delete')}}
                                </button>
                                <form method="post" id="delete{{ $partner->id }}" action="{{ route('partner.delete') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $partner->id }}">
                                </form>
                            </div>
                            <div class="modal fade text-start" id="editform{{ $partner->id }}" tabindex="-1" aria-labelledby="myModalLabel4" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel4">{{ __('translation.Edit Partener') }}</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('partner.edit') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $partner->id }}">
                                            <div class="modal-body">
                                                <div class="mb-1 mb-sm-0">
                                                    <label for="formFile" class="form-label">{{__('translation.Upload partener logo')}}</label>
                                                    <input class="form-control" name="image" type="file" id="formFile" />
                                                </div>
                                                <label>{{__('translation.Partener Name')}} </label>
                                                <div class="mb-1">
                                                    <input type="text" name="name" value="{{ $partner->name }}" placeholder="name" class="form-control" />
                                                </div>
                                                <label>{{__('translation.Partener Description')}}</label>
                                                <div class="mb-1">
                                                    <input type="text" name="description" value="{{ $partner->description }}" placeholder="description" class="form-control" />
                                                </div>
                                                <label>{{__('translation.Partener Link')}} </label>
                                                <div class="mb-1">
                                                    <input type="url" name="link" placeholder="link" value="{{ $partner->link }}" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{__('translation.save')}}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal Add -->
    <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">{{__('translation.add_partner')}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('partner.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-1 mb-sm-0">
                            <label for="formFile" class="form-label">{{__('translation.Upload partener logo')}}</label>
                            <input class="form-control" name="image" type="file" id="formFile" />
                        </div>
                        <label>{{__('translation.Partener Name')}} </label>
                        <div class="mb-1">
                            <input type="text" name="name" placeholder="name" class="form-control" />
                        </div>
                        <label>{{__('translation.cert_description')}} </label>
                        <div class="mb-1">
                            <input type="text" name="description" placeholder="description" class="form-control" />
                        </div>
                        <label>{{__('translation.Partener Link')}} </label>
                        <div class="mb-1">
                            <input type="url" name="link" placeholder="link" class="form-control" />
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


        @if ( session('alert') )
        toastr.error('{{ session('alert')}}')
        @endif
        @if ( session('success') )
        toastr.success('{{ session('alert') }}')
        @endif

        @error('image')
        toastr.warning('<br><br><br> {{ $message }}')
        @enderror
        @error('name')
        toastr.warning('<br><br><br> {{ $message }}')
        @enderror
        @error('link')
        toastr.warning('<br><br><br> {{ $message }}')
        @enderror
        @error('description')
        toastr.warning('<br><br><br> {{ $message }}')
        @enderror


    </script>

@endsection
