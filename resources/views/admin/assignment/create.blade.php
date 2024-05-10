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
    <h2>Create Assingment</h2>
</div>
<div class="card">
    <div class="card-body">
        @if (isset($item))
        {!! Form::model($item, [
        'route' => ['assignment_management.update', $item->id],
        'method' => 'PUT',
        'class' => 'custom-validation',
        'files' => true,
        'role' => 'form',
        'id' => 'edit-form',
        ]) !!}
        @else
        {!! Form::open([
        'route' => ['assignment_management.store'],
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
                    {!! Form::label('title', 'Title') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::text('title', isset($item->title) ? $item->title : null, ['class' => 'form-control']) !!}

                        {!! $errors->first('title', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('teacherId', 'Teacher Name') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::select('teacherId', $teacher, isset($item->teacherId) ? $item->teacherId : null, [
                        'class' => 'form-control',
                        ]) !!}

                        {!! $errors->first('teacherId', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('courseId', 'Course Name') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::select('courseId', $course, isset($item->courseId) ? $item->courseId : null, [
                        'class' => 'form-control',
                        'id' => 'course-dropdown'
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
                    {!! Form::label('classId', 'Class No.') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::select('classId', [], null, ['class' => 'form-control', 'id' => 'class-dropdown']) !!}
                        {!! $errors->first('classId', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('assignmentDate', 'Assingment Date') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::text('assignmentDate', isset($item->assignmentDate) ? $item->assignmentDate : null, [
                        'class' => 'form-control datepicker',
                        ]) !!}

                        {!! $errors->first('assignmentDate', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>

                <div class="row">
                <div class="col-md-2 text-right">
                    {!! Form::label('file', 'Assignment File') !!}
                </div>
                <div class="col-lg-5">
                    <div class="form-group">
                        {!! Form::file('file', [
                        'class' => 'form-control',
                        'accept' => '.pdf, .doc, .docx, .txt',
                        ]) !!}
                        {!! $errors->first('file', '<p class="help-block text-danger">:message</p>') !!}
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('status', 'Status') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::select('status', $is_approved, isset($item->status) ? $item->status : 1, [
                                'class' => 'form-control',
                            ]) !!}

                            {!! $errors->first('status', '<p class="help-block text-danger">:message</p>') !!}
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
                // Add the "Select Batch" option as the default option
                $('#batch-dropdown').append('<option value="">Select Batch</option>');

                $.get('/get-batches/' + courseId, function(data) {
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

                $.get('/get-classes-admin/' + batchId, function(data) {
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
    $(function() {
        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });
    });
</script>
@endsection