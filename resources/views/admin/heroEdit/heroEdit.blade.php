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
        <h2>Hero Banner Section</h2>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- @if (isset($hero))
                {!! Form::model($hero, [
                    'route' => ['student_management.update', $hero->id],
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
            @endif --}}

            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{ session()->get('message') }}</strong>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @if (is_array(session()->get('error')))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach (session()->get('error') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <strong>{{ session()->get('error') }}</strong>
                    @endif
                </div>
            @endif
            {{-- {{dd($errors)}} --}}
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="js-message-wrap">

            </div>

            <form class="custom-validation" method="post" action="{{ route('submit_hero') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('hero_title', 'Hero Title') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::text('hero_title', isset($hero->hero_title) ? $hero->hero_title : null, [
                                'class' => 'form-control',
                            ]) !!}

                            {{-- {!! $errors->first('StudentName', '<p class="help-block text-danger">:message</p>') !!} --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('hero_description', 'Hero Description') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::textarea('hero_description', isset($hero->hero_description) ? $hero->hero_description : null, [
                                'class' => 'form-control',
                            ]) !!}

                            {{-- {!! $errors->first('Email', '<p class="help-block text-danger">:message</p>') !!} --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('hero_video', 'Hero Video (Youtube Link)') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::text('hero_video', isset($hero->hero_video) ? $hero->hero_video : null, [
                                'class' => 'form-control',
                            ]) !!}

                            {{-- {!! $errors->first('BirthDate', '<p class="help-block text-danger">:message</p>') !!} --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('workshop_title', 'Workshop Title') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::text('workshop_title', isset($hero->workshop_title) ? $hero->workshop_title : null, [
                                'class' => 'form-control',
                            ]) !!}

                            {{-- {!! $errors->first('PhoneNo', '<p class="help-block text-danger">:message</p>') !!} --}}
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-2 text-right">
                        {!! Form::label('hero_banner_image', 'Upload Image (574x575)') !!}
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::file('hero_banner_image', [
                                'class' => 'form-control',
                            ]) !!}
                        </div>
                    </div>
                </div> --}}







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
