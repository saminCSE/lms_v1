@extends('layouts.master.admin')
@section('css')
    <!-- datatables css -->
    <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="card shadow mb-12">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @elseif(session('delete_status'))
            <div class="alert alert-danger">{{ session('delete_status') }}</div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th class="th-sm">SL</th>
                                    <th class="th-sm">Course Name</th>
                                    <th class="th-sm">Batch Name</th>
                                    <th class="th-sm">Student Name</th>
                                    <th class="th-sm">Student Email</th>
                                    <th class="th-sm">Enroll Date</th>
                                    <th class="th-sm">Amount</th>
                                    <th class="th-sm">Enrollment Status</th>
                                    <th class="th-sm">Cancellation Reason</th>
                                    <th class="th-sm">Payment Status</th>
                                    <th class="th-sm">Contact Status</th>

                                    <th class="th-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $enrollData)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $enrollData->course_name }}</td>
                                        <td>{{ $enrollData->batch_name }}</td>
                                        <td>{{ $enrollData->student_name }}</td>
                                        <td>{{ $enrollData->student_email }}</td>
                                        <td>{{ $enrollData->enrollmentDate }}</td>
                                        <td>{{ $enrollData->amount }}</td>
                                        <td>
                                            @if ($enrollData->status=='Complete')
                                                <button class="btn btn-success btn-xs">Enrolled</button>
                                            @elseif ($enrollData->status=='Pending')
                                                <button class="btn btn-danger btn-xs">Not Enrolled</button>
                                            @endif
                                        </td>
                                        <td>{{ $enrollData->cancellationReason }}</td>
                                        <td>
                                            @if ($enrollData->manual_paymentStatus)
                                                <button class="btn btn-success btn-xs">Received</button>
                                            @else
                                                <button class="btn btn-danger btn-xs">Not Received</button>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($enrollData->contactStatus)
                                                <button class="btn btn-success btn-xs">Contacted</button>
                                            @else
                                                <button class="btn btn-danger btn-xs">Not Yet</button>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ url('enrolled_student/' . $enrollData->id . '/edit') }}"
                                                class="btn btn-warning btn-xs mr-3" data-toggle="tooltip" title="Edit"
                                                style="display:inline;padding:2px 5px 3px 5px;">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            {!! Form::open([
                                                'route' => ['enrolled_student.destroy', $enrollData->id],
                                                'method' => 'delete',
                                                'style' => 'display:inline',
                                            ]) !!}
                                            <button class="btn btn-danger btn-xs text-white" data-toggle="tooltip"
                                                title="Delete" style="display:inline;padding:2px 5px 3px 5px;"
                                                onclick="return confirm('Are you sure to delete this ?')"><i
                                                    class="fas fa-times"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    {{-- @if (!count($announce)) --}}
                                    {{-- <tr class="row1"> --}}
                                    {{-- <td colspan="8" class="text-center"> No record found. </td> --}}

                                    {{-- </tr> --}}

                                    {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection
