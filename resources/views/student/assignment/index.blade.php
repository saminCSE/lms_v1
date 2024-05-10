@extends('layouts.master.student')
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
    <h2>Assignment List</h2>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="th-sm">SL</th>
                                <th class="th-sm">Title</th>
                                <th class="th-sm">Course Name</th>
                                <th class="th-sm">Batch Name</th>
                                <th class="th-sm">Teacher Name</th>
                                <th class="th-sm">Class No.</th>
                                <th class="th-sm">Assignment Date</th>
                                <th class="th-sm">File Name</th>
                                <th class="th-sm">Download File</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assignments as $assignment)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $assignment->title }}</td>
                                <td>{{ $assignment->course_name }}</td>
                                <td>{{ $assignment->batch_name }}</td>
                                <td>{{ $assignment->teacher_name }}</td>
                                <td>{{ $assignment->classId}}</td>
                                <td>{{ $assignment->assignmentDate }}</td>
                                <td>{{ $assignment->file }}</td>
                                <td>
                                    <a href="{{ asset('uploads/assignments/' . $assignment->file) }}" download="{{ $assignment->file }}">
                                        Download
                                    </a>
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