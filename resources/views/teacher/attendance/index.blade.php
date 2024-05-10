@extends('layouts.master.teacher')
@section('css')
<!-- datatables css -->
<link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {!! Form::open([
                'route' => ['student_attendance'],
                'method' => 'POST',
                'class' => 'custom-validation',
                'files' => true,
                'role' => 'form',
                'id' => 'form_custom',
                ]) !!}
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            {!! Form::select('courseId', $course, isset($item->courseId) ? $item->courseId : null, [
                            'class' => 'form-control',
                            'id' => 'course-dropdown',
                            ]) !!}

                            {!! $errors->first('courseId', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            {!! Form::select('batchId', [], null, ['class' => 'form-control', 'id' => 'batch-dropdown']) !!}
                            {!! $errors->first('batchId', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            {!! Form::select('classNo', [], null, ['class' => 'form-control', 'id' => 'class-dropdown']) !!}
                            {!! $errors->first('classNo', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <div>
                                <button type="submit" id="btn_search" class="btn btn-primary waves-effect waves-light mr-1">
                                    Search
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="card shadow mb-12">
    @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="d-flex justify-content-center">Attendance Of date: {{ date('Y-m-d') }}</h3>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="th-sm">SL</th>
                                <th class="th-sm">Student Name</th>
                                <th class="th-sm">Class Title</th>
                                <th class="th-sm">Course Name</th>
                                <th class="th-sm">Batch Name</th>
                                <th class="th-sm">Start Time</th>
                                <th class="th-sm">End Time</th>
                                <th class="th-sm">Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $row)
                            @php

                            $attendanceRecord = DB::table('attendance')
                            ->where('studentId', $row->student_id)
                            ->where('courseId', $row->course_id)
                            ->where('batchId', $row->batch_id)
                            ->where('classNo', $row->classNo)
                            ->whereDate('attendance_date', now()->toDateString())
                            ->first();

                            $isPresent = ($attendanceRecord && $attendanceRecord->is_present) ? 1 : 0;

                            @endphp
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$row->student_name}}</td>
                                <td>{{$row->classTitle}}</td>
                                <td>{{$row->course_name}}</td>
                                <td>{{$row->batch_name}}</td>
                                <td>{{$row->startTime}}</td>
                                <td>{{$row->endTime}}</td>
                                <td>
                                    <label>
                                        <input type="radio" name="attendance[{{$row->student_id}}]" value="1" data-student-id="{{$row->student_id}}" data-course-id="{{$row->course_id}}" data-batch-id="{{$row->batch_id}}" data-class-no="{{$row->classNo}}" class="attendance-radio" {{ $isPresent == 1 ? 'checked' : '' }}>
                                        Present
                                    </label>
                                    <label>
                                        <input type="radio" name="attendance[{{$row->student_id}}]" value="0" data-student-id="{{$row->student_id}}" data-course-id="{{$row->course_id}}" data-batch-id="{{$row->batch_id}}" data-class-no="{{$row->classNo}}" class="attendance-radio" {{ $isPresent == 0 ? 'checked' : '' }}>
                                        Absent
                                    </label>
                                </td>
                            </tr>
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
<script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.attendance-radio').click(function() {
            var studentId = $(this).data('student-id');
            var courseId = $(this).data('course-id');
            var batchId = $(this).data('batch-id');
            var classNo = $(this).data('class-no');
            var is_present = $(this).val();
            var currentDate = new Date().toISOString().slice(0, 10);

            // Send the attendance data to the server using AJAX
            $.ajax({
                type: 'POST',
                url: '/attendance/update', // Replace with your route URL for updating attendance
                data: {
                    studentId: studentId,
                    courseId: courseId,
                    batchId: batchId,
                    classNo: classNo,
                    is_present: is_present,
                    attendance_date: currentDate,
                    _token: $('meta[name="csrf-token"]').attr('content'),
                },
                success: function(response) {
                    if (response.status === 'success') {
                        // alert('Attendance updated successfully');
                    } else {
                        alert('Attendance update failed');
                    }
                },
                error: function() {
                    alert('An error occurred while updating attendance');
                }
            });
        });
        $('#course-dropdown').change(function() {
            var courseId = $(this).val();

            // Clear the "Batch Name" dropdown
            $('#batch-dropdown').empty();

            if (courseId) {
                // Add the "Select Batch" option as the default option
                $('#batch-dropdown').append('<option value="">Select Batch</option>');

                $.get('/get-stduent-batches/' + courseId, function(data) {
                    $.each(data, function(key, value) {
                        $('#batch-dropdown').append('<option value="' + key + '">' + value + '</option>');
                    });
                });
            } else {
                // If no course is selected, add the "Select Batch" option as the default option
                $('#batch-dropdown').append('<option value="">Select Batch</option>');
            }
        }); 
            $('#batch-dropdown').change(function() {
            var batchId = $(this).val();

            // Clear the "Batch Name" dropdown
            $('#class-dropdown').empty();

            if (batchId) {
                // Add the "Select Batch" option as the default option
                $('#class-dropdown').append('<option value="">Select Class</option>');

                $.get('/get-student-classes/' + batchId, function(data) {
                    $.each(data, function(key, value) {
                        $('#class-dropdown').append('<option value="' + value + '">' + value + '</option>');
                    });
                });
            } else {
                // If no course is selected, add the "Select Batch" option as the default option
                $('#class-dropdown').append('<option value="">Select Class</option>');
            }
        });
    });
</script>
@endsection