@extends('layouts.master.admin')
@section('css')
    <!-- datatables css -->
    <!-- <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/> -->
    <link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    {{-- @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
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
    <div class="row justify-content-center">
        <h2>Edit Course Section & Lecture Module</h2>
    </div>
    <div class="card">
        <div class="card-body">
            {{-- @if (isset($item))
                {!! Form::model($item, [
                    'route' => ['course.update', $item->id],
                    'method' => 'PUT',
                    'class' => 'custom-validation',
                    'files' => true,
                    'role' => 'form',
                    'id' => 'edit-form',
                ]) !!}
            @else
                {!! Form::open([
                    'route' => ['course.store'],
                    'method' => 'POST',
                    'class' => 'custom-validation',
                    'files' => true,
                    'role' => 'form',
                    'id' => 'add-form',
                ]) !!}
            @endif --}}

            <div class="row">
                <div class="col-12">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    {{-- <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li> --}}
                                    <li class="breadcrumb-item active" aria-current="page">Edit Lecture Course</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="ms-auto">
                            <div class="btn-group">
                                <a href="{{ route('add.course.lecture', ['id' => $clecture->course_id]) }}"
                                    class="btn btn-primary px-5">Back </a>
                            </div>
                        </div>

                    </div>
                    <!--end breadcrumb-->

                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="mb-4">Edit Lecture</h5>
                            {{-- <form id="myForm" action="{{ route('store.category') }}" method="post" class="row g-3"
                                enctype="multipart/form-data"> --}}
                            <form id="myForm" action="{{ route('update.course.lecture') }}" method="post"
                                class="row g-3" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $clecture->id }}">

                                <div class="form-group col-md-6">
                                    <label for="input1" class="form-label">Lecture Title</label>
                                    <input type="text" name="lecture_title" class="form-control" id="input1"
                                        value="{{ $clecture->lecture_title }}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="input1" class="form-label">Video Url </label>
                                    <input type="text" name="url" class="form-control" id="input1"
                                        value="{{ $clecture->url }}">
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="input1" class="form-label">Lecture Content </label>
                                    <textarea name="content" class="form-control">{{ $clecture->content }}</textarea>
                                </div>



                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


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
        @endsection
