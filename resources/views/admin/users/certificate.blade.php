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
                <a class="nav-link active" href="{{ route('admin.user.certificate',$user->id) }}">
                    <i data-feather="lock" class="font-medium-3 me-50"></i>
                    <span class="fw-bold">{{__('translation.cert')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.user.exam',$user->id) }}">
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
                    <i data-feather="link" class="font-medium-3 me-50"></i><span class="fw-bold">{{__('translation.user_reservation')}}</span>
                </a>
            </li>
        </ul>
        <!--/ User Pills -->

        <!-- Project table -->
        <div class="card">
            <h4 class="card-header">{{__('translation.user_cert')}}</h4>
            <div class="table-responsive">
                <table class="table datatable-project">
                    <thead>
                    <tr>
                        <th>NO.</th>
                        <th>{{__('translation.cert')}}</th>
                        <th class="text-nowrap">{{__('translation.cert_description')}}</th>
                        <th>{{__('translation.date')}}</th>
                        <th>{{__('translation.action')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                   @foreach($user->last_certificate as $certificate)
                     <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $certificate->title }}</td>
                        <td>{{ $certificate->description }}</td>
                        <td>{{ $certificate->date }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                                    <i data-feather="more-vertical"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editform{{ $certificate->id }}">
                                        <i data-feather="edit-2" class="me-50"></i>
                                        <span>{{__('translation.edit')}}</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ url('file/certificate',$certificate->file) }}">
                                        <i data-feather="download" class="me-50"></i>
                                        <span>{{__('translation.download')}}</span>
                                    </a>
                                    <a class="dropdown-item"  onclick="if(confirm('{{__('translation.confirm_delete_cert')}}')){
                                        $('#delete{{ $certificate->id }}').submit()
                                        }">
                                        <i data-feather="trash" class="me-50"></i>
                                        <span>{{__('translation.delete')}}</span>
                                    </a>
                                </div>
                            </div>
                            <form method="post" id="delete{{ $certificate->id }}" action="{{ route('admin.users.last.certificate.delete') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $certificate->id }}">
                            </form>

                            <!-- Modal Edit-->
                            <div class="modal fade text-start" id="editform{{ $certificate->id }}" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel2">{{__('translation.Edit cert')}}</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="post" action="{{ route('admin.users.last.certificate.edit') }}" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $certificate->id }}">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="name">{{__('translation.cert')}}</label>
                                                            <input type="text" class="form-control" name="title" value="{{ $certificate->title }}" id="name"  />
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="Description">{{__('translation.cert_description')}}</label>
                                                            <input type="text" class="form-control" id="Description" name="description" value="{{ $certificate->description }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-md-12 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="date">{{__('translation.date')}}</label>
                                                            <input type="date" class="form-control" id="date" name="date" value="{{ $certificate->date }}" placeholder="Enter Certificate Date" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 mb-1 mb-sm-0">
                                                        <label for="formFile" class="form-label">{{__('translation.cert_description')}}</label>
                                                        <input class="form-control" type="file" name="file" id="formFile" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{__('translation.save')}}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                   @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /Project table -->

        <!-- Activity Timeline -->
        <div class="card">
            <div class="basic-modal">
                <button style="width: 100%" type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#default">
{{__('add')}}
                </button>

                <!-- Modal -->
                <div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">{{__('translation.add_cert')}}</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ route('admin.users.last.certificate.add') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">{{__('translation.name')}}</label>
                                                <input type="text" class="form-control" name="title" id="name" placeholder="Enter Certificate Name" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="Description">{{__('translation.description')}}</label>
                                                <input type="text" class="form-control" name="description" id="Description" placeholder="Enter Certificate Description" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="date">{{__('translation.date')}}</label>
                                                <input type="date" class="form-control" name="date" id="date" placeholder="Enter Certificate Date" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 mb-1 mb-sm-0">
                                            <label for="formFile" class="form-label">{{__('translation.file_upload')}}</label>
                                            <input class="form-control" name="file" type="file" id="formFile" />
                                        </div>
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
        <!-- /Activity Timeline -->
    </div>
    <!--/ User Content -->
<script>
    @error('file')
    alert('{{ $message }}')
    @enderror
    @error('title')
    alert('{{ $message }}')
    @enderror
    @error('description')
    alert('{{ $message }}')
    @enderror
</script>
@endsection
