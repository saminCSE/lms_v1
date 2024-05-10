@extends('layouts.master.admin')
@section('css')
<!-- datatables css -->
<!-- <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/> -->
<link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    table,
    td,
    th {
        vertical-align: middle !important;
    }

    table th {
        font-weight: bold;
    }
</style>
@endsection
@section('content')
@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<div class="row justify-content-center">
    <h2>Student Enrollment</h2>
</div>
<div class="card">
    <div class="card-body">
        @if (isset($item))
        {!! Form::model($item, [
        'route' => ['enrolled_student.update', $item->id],
        'method' => 'PUT',
        'class' => 'custom-validation',
        'files' => true,
        'role' => 'form',
        'id' => 'edit-form',
        ]) !!}
        @else
        {!! Form::open([
        'route' => ['enrolled_student.store'],
        'method' => 'POST',
        'class' => 'custom-validation',
        'files' => true,
        'role' => 'form',
        'id' => 'add-form',
        ]) !!}
        @endif

        <form class="custom-validation" action="#">
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('courseId', 'Course Name') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::select('courseId', $course, isset($item->courseId) ? $item->courseId : null, [
                        'class' => 'form-control',
                        'id' => 'course-dropdown',
                        ]) !!}

                        {!! $errors->first('courseId', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('batchId', 'Batch Name') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::select('batchId', [], null, ['class' => 'form-control', 'id' => 'batch-dropdown']) !!}
                        {!! $errors->first('batchId', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('studentEmail', 'Student Email') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::select('studentEmail', $StudentEmail, isset($item->studentEmail) ? $item->studentEmail : null, [
                        'class' => 'form-control',
                        'id' => 'student-email',
                        ]) !!}

                        {!! $errors->first('studentEmail', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('studentId', 'Student Name') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::select('studentId', $student, isset($item->studentId) ? $item->studentId : null, [
                        'class' => 'form-control',
                        'id' => 'student-name',
                        ]) !!}

                        {!! $errors->first('studentId', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('enrollmentDate', 'Enrollment Date') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::text('enrollmentDate', isset($item->enrollmentDate) ? $item->enrollmentDate : null, [
                        'class' => 'form-control datepicker',
                        ]) !!}

                        {!! $errors->first('enrollmentDate', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('enrollStatus', 'Enrollment Status') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::select('enrollStatus', $enroll_status, isset($item->enrollStatus) ? $item->enrollStatus : 1, [
                        'class' => 'form-control',
                        ]) !!}

                        {!! $errors->first('enrollStatus', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('cancellationReason', 'cancellation Reason') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::text('cancellationReason', isset($item->cancellationReason) ? $item->cancellationReason : null, [
                        'class' => 'form-control',
                        ]) !!}

                        {!! $errors->first('cancellationReason', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('paymentStatus', 'Payment Status') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::select('paymentStatus', $payment_status, isset($item->paymentStatus) ? $item->paymentStatus : 1, [
                        'class' => 'form-control',
                        ]) !!}

                        {!! $errors->first('paymentStatus', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('amount', 'Amount') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::text('amount', isset($item->amount) ? $item->amount : null, ['class' => 'form-control']) !!}

                        {!! $errors->first('amount', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('contactStatus', 'Contact Status') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::select('contactStatus', $contact_status, isset($item->contactStatus) ? $item->contactStatus : 1, [
                        'class' => 'form-control',
                        ]) !!}

                        {!! $errors->first('contactStatus', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 text-right">
                    <div class="form-group mb-0">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div> <!-- end col -->
@endsection

@section('scripts')
<!-- Plugins js -->
<!-- <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>
        <script src="{{ URL::asset('assets/libs/jquery-ui/jquery-ui.min.js') }}"></script> -->
<script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#course-dropdown').change(function() {
            var courseId = $(this).val();

            // Clear the "Batch Name" dropdown
            $('#batch-dropdown').empty();

            if (courseId) {
                $.get('/get-batches/' + courseId, function(data) {
                    $.each(data, function(key, value) {
                        $('#batch-dropdown').append('<option value="' + key + '">' + value + '</option>');
                    });
                });
            }
        });
        
        $('#student-email').change(function () {
            var studentEmail = $(this).val();
            var studentNameDropdown = $('#student-name');

            // Clear the "Student Name" dropdown
            studentNameDropdown.empty();

            if (studentEmail) {
                $.get('/get-student-name/' + studentEmail, function (data) {
                    studentNameDropdown.append($('<option>', {
                        value: data.id,
                        text: data.StudentName
                    }));
                });
            }
        });
    });
    $(function() {
        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });
    });
</script>
@endsection