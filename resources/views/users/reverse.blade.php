@extends('users.user')
@section('page')
  <!-- Project table -->
  <div class="card">
    <h4 class="card-header">{{__('translation.user_reservation')}}</h4>
    <div class="table-responsive">
      <table class="table datatable-project">
        <thead>
        <tr>
          <th>{{__('translation.Paid')}}</th>
          <th>{{__('translation.cert')}}</th>
          <th class="text-nowrap">{{__('translation.Description')}}</th>
          <th>{{__('translation.date')}}</th>
          <th>{{__('translation.action')}}</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($enrolls as $enroll )
            <tr>
                @if ($enroll->pay == 1)
                <td>{{__('translation.Paid')}}</td>
                @else
                <td>{{__('translation.not_Paid')}}</td>
                @endif
                <td>{{ $enroll->cert->cat->title }}</td>
                <td>{{ $enroll->cert->title }}</td>
                <td>{{ date('M j, Y', strtotime( $enroll->created_at)) }}</td>
                <td>
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow py-0" data-bs-toggle="dropdown">
                            <i data-feather="more-vertical"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            @if ($enroll->pay == 0)
                            <a class="dropdown-item" herf="{{ route('user.pay',$enroll->id) }}">
                                <i data-feather="pay" class="me-50"></i>
                                <span>{{__('translation.Pay ONLINE')}}</span>
                        </a>
                            @endif
                            <a class="dropdown-item"
                            onclick=" if(confirm('Are You Sure Delete This Course')){
                                $('#delete{{ $enroll->id }}').submit()
                           }">
                                <i data-feather="trash" class="me-50"></i>
                                <span>{{__('translation.delete')}}</span>
                            </button>

                            <form method="post" id="delete{{ $enroll->id }}" action="{{ route('admin.user.reverse.delete') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $enroll->id }}">
                            </form>
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
  @endsection
