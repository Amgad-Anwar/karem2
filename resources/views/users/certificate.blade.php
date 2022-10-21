@extends('users.user')

@section('page')

        <!-- Project table -->
        <div class="card">
            <h4 class="card-header">{{__('translation.user_cert')}}</h4>
            <div class="table-responsive">
                <table class="table datatable-project">
                    <thead>
                    <tr>
                        <th>NO.</th>
                        <th>{{__('translation.cert')}}</th>
                        <th class="text-nowrap">{{__('translation.Description')}}</th>
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
                                        <a class="dropdown-item"  onclick="if(confirm('Are You Sure Delete this Organization')){
                                            $('#delete{{ $certificate->id }}').submit()
                                            }">
                                            <i data-feather="trash" class="me-50"></i>
                                            <span>{{__('translation.delete')}}</span>
                                        </a>
                                    </div>
                                </div>
                                <form method="post" id="delete{{ $certificate->id }}" action="{{ route('users.last.certificate.delete') }}">
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
                                            <form method="post" action="{{ route('users.last.certificate.edit') }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $certificate->id }}">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-xl-12 col-md-12 col-12">
                                                            <div class="mb-1">
                                                                <label class="form-label" for="name">{{__('translation.Certificate Name')}}</label>
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
                                                            <label for="formFile" class="form-label">{{__('translation.upload')}}</label>
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
{{__('translation.Add new Certificate')}}                </button>

                <!-- Modal -->
                <div class="modal fade text-start" id="default" tabindex="-1" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel1">{{__('translation.Add new Certificate')}}  </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="post" action="{{ route('admin.users.last.certificate.add') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="name">{{__('translation.Certificate Name')}}</label>
                                                <input type="text" class="form-control" name="title" id="name" placeholder="Enter Certificate Name" />
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-md-12 col-12">
                                            <div class="mb-1">
                                                <label class="form-label" for="Description">{{__('translation.Description')}}</label>
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
                                            <label for="formFile" class="form-label">{{__('translation.upload')}}</label>
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
