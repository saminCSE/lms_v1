@extends('layouts.master.admin')
@section('css')
    <!-- datatables css -->
    <!-- <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/> -->
    <link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css" />
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
        <h2>Create Class</h2>
    </div>
    <div class="card">
        <div class="card-body">
            @if (isset($item))
                {!! Form::model($item, [
                    'route' => ['class.update', $item->id],
                    'method' => 'PUT',
                    'class' => 'custom-validation',
                    'files' => true,
                    'role' => 'form',
                    'id' => 'edit-form',
                ]) !!}
            @else
                {!! Form::open([
                    'route' => ['class.store'],
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
                        {!! Form::label('classTitle', 'Class Title') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::text('classTitle', isset($item->classTitle) ? $item->classTitle : null, ['class' => 'form-control']) !!}

                            {!! $errors->first('classTitle', '<p class="help-block text-danger">:message</p>') !!}
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
                        {!! Form::label('classNo', 'Class No.') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::text('classNo', isset($item->classNo) ? $item->classNo : null, ['class' => 'form-control']) !!}

                            {!! $errors->first('classNo', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('classDate', 'Class Date') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::text('classDate', isset($item->classDate) ? $item->classDate : null, [
                                'class' => 'form-control datepicker',
                            ]) !!}

                            {!! $errors->first('classDate', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('startTime', 'Start Time') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::time('startTime', isset($item->startTime) ? $item->startTime : null, ['class' => 'form-control']) !!}

                            {!! $errors->first('startTime', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('endTime', 'End Time') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::time('endTime', isset($item->endTime) ? $item->endTime : null, ['class' => 'form-control']) !!}

                            {!! $errors->first('endTime', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('is_active', 'Status') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::select('is_active', $is_active, isset($item->is_active) ? $item->is_active : 1, [
                                'class' => 'form-control',
                            ]) !!}

                            {!! $errors->first('is_active', '<p class="help-block text-danger">:message</p>') !!}
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
