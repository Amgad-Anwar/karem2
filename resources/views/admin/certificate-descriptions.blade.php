@extends('layouts.admin')
@section('add')
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
       {{__('translation.add_cert_detail')}}
    </button>
@endsection
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('translation.cert_details')}}</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>{{__('translation.cert_cat')}}</th>
                                <th>{{__('translation.Name')}}</th>
                                <th>{{__('translation.Required competencies')}}</th>
                                <th>{{__('translation.cert_description')}}</th>
                                <th>{{__('translation.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $descriptions as $description)
                                <tr>
                                    <td>
                                        <span class="fw-bold">{{ $description->cat->title }}</span>
                                    </td>
                                    <td>{{ $description->title }}</td>
                                    <td>
                                        {!! $description->required !!}
                                    </td>
                                    <td>
                                        <p>{!! $description->description !!}</p>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editform{{ $description->id }}">
                                                    {{__('translation.edit')}}
                                                </button>
                                                <button type="button"
                                                        onclick="if(confirm('{{__('translation.confirm_delete_cert')}}')){
                                                            $('#delete{{ $description->id }}').submit()
                                                            }"
                                                        class="btn btn-outline-danger">
                                                    {{__('translation.delete')}}
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <form method="post" id="delete{{ $description->id }}" action="{{ route('admin.certificate.descriptions.delete') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $description->id }}">
                                </form>

                                <div class="modal fade text-start" id="editform{{ $description->id }}" tabindex="-1" aria-labelledby="myModalLabel4" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel4">{{__('translation.Edit cert')}}</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('admin.certificate.descriptions.edit') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $description->id }}">
                                                <div class="modal-body">
                                                    <div class="col-12">
                                                        <label class="form-label" for="default-select">{{__('translation.cert_cat')}}</label>
                                                        <div class="mb-1">
                                                            <select class="select2 form-select" name="cat_id" id="default-select">
                                                                @foreach( $cats as $cat)
                                                                    <option {{ $cat->id == $description->cat->id? 'selected':' ' }} value="{{ $cat->id }}">{{ $cat->title  }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <label>{{__('translation.Certificate Name')}} </label>
                                                    <div class="mb-1">
                                                        <input type="text" placeholder="name" name="title" value="{{ $description->title }}" class="form-control" />
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="exampleFormControlTextarea1">{{__('translation.Required competencies')}}</label>
                                                        <textarea class=" ckeditor form-control " name="required"  id="ckeditor1{{ $description->id }}" placeholder="Required competencies">{!! $description->required !!} </textarea>
                                                    </div>
                                                    <div class="mb-1">
                                                        <label class="form-label" for="exampleFormControlTextarea2">{{__('translation.cert_description')}}</label>
                                                        <textarea class="ckeditor form-control" name="description" id="ckeditor2{{ $description->id }}" placeholder="Certificate Description">{!! $description->description !!}</textarea>
                                                    </div>
                                                    <label>{{__('translation.Certificate Price')}}</label>
                                                    <div class="mb-1">
                                                        <input type="number" placeholder="Price" name="price" value="{{ $description->price }}" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{__('translation.save')}}</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">

                                    ClassicEditor
                                        .create( document.querySelector( '#ckeditor1{{ $description->id }}' ), {
                                            toolbar: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote'],
                                        })
                                        .catch( error => {
                                            console.error( error );
                                        } );

                                    ClassicEditor
                                        .create( document.querySelector( '#ckeditor2{{ $description->id }}' ) ,{
                                            toolbar: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote'],
                                        })
                                        .catch( error => {
                                            console.error( error );
                                        } );

                                </script>


                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-start" id="inlineForm" tabindex="-1" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">{{__('translation.add_cert_detail')}}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.certificate.descriptions.add') }}" method="post" enctype="multipart/form-data">
                   @csrf
                    <div class="modal-body">
                        <div class="col-12">
                            <label class="form-label" for="default-select">{{__('translation.cert_cat')}}</label>
                            <div class="mb-1">
                                <select class="select2 form-select" name="cat_id" id="default-select">
                                    @foreach( $cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->title  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label>{{__('translation.Certificate Name')}} </label>
                        <div class="mb-1">
                            <input type="text" placeholder="name" name="title" class="form-control" />
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="exampleFormControlTextarea1">{{__('translation.Required competencies')}}</label>
                            <textarea class=" ckeditor form-control " name="required" id="ckeditor1" placeholder="Required competencies"></textarea>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="exampleFormControlTextarea2">{{__('translation.cert_description')}}</label>
                            <textarea class="ckeditor form-control" name="description" id="ckeditor2" placeholder="Certificate Description"></textarea>
                        </div>
                        <label>{{__('translation.Certificate Price')}} </label>
                        <div class="mb-1">
                            <input type="number" placeholder="Price" name="price" class="form-control" />
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{__('translation.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        ClassicEditor
            .create( document.querySelector( '#ckeditor1' ), {
                toolbar: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote'],
            })
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#ckeditor2' ) ,{
                toolbar: ['heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote'],
            })
            .catch( error => {
                console.error( error );
            } );

    </script>

@endsection
