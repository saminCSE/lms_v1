@extends('layouts.master.student')
@section('css')
<!-- datatables css -->
<link href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="card shadow mb-12">
    @if (session('status'))
    <div class="alert alert-success">{{ session('status')}}</div>
    @elseif(session('delete_status'))
    <div class="alert alert-danger">{{ session('delete_status')}}</div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="th-sm">SL</th>
                                <th class="th-sm">Course Name</th>
                                <th class="th-sm">Batch Name</th>
                                <th class="th-sm">Enrollment Status</th>
                                <th class="th-sm">Enroll Date</th>
                            </tr>
                        </thead>
                         <tbody>
                            @foreach($data as $enrollmentInfo)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$enrollmentInfo->course_name}}</td>
                                <td>{{$enrollmentInfo->batch_name}}</td>
                                <td> @if ($enrollmentInfo->enrollStatus)
                                    <button class="btn btn-success btn-xs">Enrolled</button>
                                    @else
                                    <button class="btn btn-danger btn-xs">Not Enrolled</button>
                                    @endif
                                </td>
                                <td>{{$enrollmentInfo->enrollmentDate}}</td>
                            </tr>
                            {{-- @if(!count($announce))--}}
                            {{-- <tr class="row1">--}}
                            {{-- <td colspan="8" class="text-center"> No record found. </td>--}}

                            {{-- </tr>--}}

                            {{-- @endif--}}
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
<script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="{{ URL::asset('assets/libs/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@endsection
