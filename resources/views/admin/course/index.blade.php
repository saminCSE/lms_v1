@extends('layouts.master.admin')
@section('css')
    <!-- datatables css -->
    <link href="{{ URL::asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
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
                                    {{-- <th class="th-sm">Course Description</th> --}}
                                    <th class="th-sm">Course Price</th>
                                    <th class="th-sm">Programs Name</th>
                                    <th class="th-sm">Course Image</th>
                                    {{-- <th class="th-sm">Course Abstract</th> --}}
                                    <th class="th-sm">Course Duration</th>
                                    <th class="th-sm">Start Time</th>
                                    <th class="th-sm">End Time</th>
                                    <th class="th-sm">Status</th>
                                    <th class="th-sm">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $courseData)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $courseData->name }}</td>
                                        {{-- <td>
                                            @if (strlen($courseData->course_description) > 100)
                                                {{ substr($courseData->course_description, 0, 100) . '...' }}
                                            @else
                                                {{ $courseData->course_description }}
                                            @endif
                                        </td> --}}
                                        <td>{{ $courseData->course_price }}</td>
                                        <td>{{ $courseData->programs_name }}</td>
                                        {{-- <td>
                                            <img src="{{ asset('storage/img/' . $courseData->course_image) }}"
                                                alt="Program Normal Image" style="max-width: 100px; max-height: 100px;">
                                        </td> --}}
                                        <td>
                                            @if (isset($courseData->course_image_1))
                                                <img src="{{ asset('storage/img/' . $courseData->course_image_1) }}"
                                                    alt="Course Image" style="max-width: 100px; max-height: 100px;">
                                            @else
                                                No Image Available
                                            @endif
                                        </td>
                                        {{-- <td>{{ $courseData->abstract }}</td> --}}
                                        <td>{{ $courseData->course_duration }}</td>
                                        <td>{{ $courseData->start_time }}</td>
                                        <td>{{ $courseData->end_time }}</td>
                                        <td>
                                            @if ($courseData->is_active)
                                                <button class="btn btn-success btn-xs">Active</button>
                                            @else
                                                <button class="btn btn-danger btn-xs">Inactive</button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/course/' . $courseData->id . '/edit') }}"
                                                class="btn btn-warning btn-xs mr-3" data-toggle="tooltip" title="Edit"
                                                style="display:inline;padding:2px 5px 3px 5px;">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            {!! Form::open([
                                                'route' => ['course.destroy', $courseData->id],
                                                'method' => 'delete',
                                                'style' => 'display:inline',
                                            ]) !!}
                                            <button class="btn btn-danger btn-xs text-white" data-toggle="tooltip"
                                                title="Delete" style="display:inline;padding:2px 5px 3px 5px;"
                                                onclick="return confirm('Are you sure to delete this ?')"><i
                                                    class="fas fa-times"></i>
                                            </button>
                                            {!! Form::close() !!}
                                            <a href="{{ route('add.course.lecture', $courseData->id) }}"
                                                class="btn btn-warning btn-xs ml-3" data-toggle="tooltip" title="Lecture"
                                                style="display:inline;padding:2px 5px 3px 5px;" target="_blank">
                                                <i class="fa fa-list"></i>
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
