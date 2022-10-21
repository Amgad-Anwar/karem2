@extends('layouts.admin')
@section('add')
    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#inlineForm">
        {{__('translation.add_cert_cat')}}
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
                    <h4 class="card-title">{{__('translation.table_cat')}}</h4>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{__('translation.cat_title')}}</th>
                            <th>{{__('translation.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $cats as $cat)
                            <tr>
                                <td>
                                    <span class="fw-bold">{{ $i++ }}</span>
                                </td>
                                <td>{{ $cat->title }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editform{{ $cat->id }}">
                                                {{__('translation.edit')}}
                                            </button>
                                            <button type="button"
                                                    onclick="if(confirm('{{__('translation.confirm_delete_cat')}}')){
                                                        $('#delete{{ $cat->id }}').submit()
                                                        }"
                                                    class="btn btn-outline-danger">
                                                {{__('translation.delete')}}
                                            </button>
                                            <form method="post" id="delete{{ $cat->id }}" action="{{ route('admin.certificate.category.delete') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $cat->id }}">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade text-start" id="editform{{ $cat->id }}" tabindex="-1" aria-labelledby="myModalLabel4" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel4">{{__('translation.Edit Category')}}</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.certificate.category.edit') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $cat->id }}">
                                            <div class="modal-body">
                                                <label>{{__('translation.cert_cat')}} </label>
                                                <div class="mb-1">
                                                    <input type="text" name="title" value="{{ $cat->title }}" placeholder="category" class="form-control" />
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
                <h4 class="modal-title" id="myModalLabel33">{{ __('translation.add_cert_cat') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.certificate.category.add') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label>{{__('translation.cert_cat')}} </label>
                    <div class="mb-1">
                        <input type="text" name="title" placeholder="category" class="form-control" />
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
