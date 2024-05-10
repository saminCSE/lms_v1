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
        <h2>Student Information</h2>
    </div>
    <div class="card">
        <div class="card-body">
            @if (isset($item))
                {!! Form::model($item, [
                    'route' => ['student_management.update', $item->id],
                    'method' => 'PUT',
                    'class' => 'custom-validation',
                    'files' => true,
                    'role' => 'form',
                    'id' => 'edit-form',
                ]) !!}
            @else
                {!! Form::open([
                    'route' => ['student_management.store'],
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
                        {!! Form::label('StudentName', 'Student Name') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::text('StudentName', isset($item->StudentName) ? $item->StudentName : null, [
                                'class' => 'form-control',
                            ]) !!}

                            {!! $errors->first('StudentName', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('Email', 'Email') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::email('Email', isset($item->Email) ? $item->Email : null, [
                                'class' => 'form-control',
                            ]) !!}

                            {!! $errors->first('Email', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('BirthDate', 'Birth Date') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::text('BirthDate', isset($item->BirthDate) ? $item->BirthDate : null, [
                                'class' => 'form-control datepicker',
                            ]) !!}

                            {!! $errors->first('BirthDate', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('PhoneNo', 'Phone No') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::text('PhoneNo', isset($item->PhoneNo) ? $item->PhoneNo : null, ['class' => 'form-control']) !!}

                            {!! $errors->first('PhoneNo', '<p class="help-block text-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('password', 'Password') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <div class="input-group">
                                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password']) !!}
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary toggle-password" type="button"
                                        onclick="togglePassword('password')">
                                        <i class="fa fa-eye" id="togglePasswordIcon"></i>
                                    </button>
                                </div>
                            </div>
                            {{-- {!! $errors->first('password', '<p class="help-block text-danger">:message</p>') !!} --}}
                            @if ($errors->has('password'))
                                <p class="help-block text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('confirm_password', 'Confirm Password') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            <div class="input-group">
                                {!! Form::password('confirm_password', ['class' => 'form-control', 'id' => 'confirm_password']) !!}
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary toggle-password"
                                        onclick="togglePassword('confirm_password')">
                                        <i class="fa fa-eye" id="toggleConfirmPasswordIcon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        {!! $errors->first('confirm_password', '<p class="help-block text-danger">:message</p>') !!}
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
        $(function() {
            $('.datepicker').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'yyyy-mm-dd',
            });
        });
    </script>
    <script>
        function togglePassword(inputFieldId) {
            const input = document.getElementById(inputFieldId);
            const iconId = inputFieldId === 'password' ? 'togglePasswordIcon' : 'toggleConfirmPasswordIcon';
            const passwordIcon = document.getElementById(iconId);

            if (input.type === "password") {
                input.type = "text";
                passwordIcon.classList.remove("fa-eye");
                passwordIcon.classList.add("fa-eye-slash");
            } else {
                input.type = "password";
                passwordIcon.classList.remove("fa-eye-slash");
                passwordIcon.classList.add("fa-eye");
            }
        }
    </script>
@endsection
