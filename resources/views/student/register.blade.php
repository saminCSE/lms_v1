<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Wings Learning</title>
    @include('layouts.header')
    <link href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="page-top" style="background-color: #f2f0f0 !important;">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center" style="padding-top: 150px;">
            <a href="/"><img src="{{ asset('assets/img/wingslogo.png') }}" style="padding-right: 25px;"
                    alt="Wings"></a>
            <h1 style="color: red; font-size: 60px; font-family:Arial">WINGS LEARNING CENTRE</h1>
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Student Registration</h1>
                                    </div>
                                    @if (session('error-msg'))
                                        <div class="alert alert-danger">{{ session('error-msg') }}</div>
                                    @endif
                                    <form action="{{ route('student_register') }}" method="post" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputStudentName" aria-describedby="StudentNameHelp"
                                                name="StudentName" placeholder="Enter Full Name...">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="email"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user datepicker"
                                                id="exampleInputBirthDate" aria-describedby="BirthDateHelp"
                                                name="BirthDate" placeholder="Enter BirthDate...">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputBirthDate" aria-describedby="PhoneNoHelp" name="PhoneNo"
                                                placeholder="Enter PhoneNo...">
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" class="form-control form-control-user"
                                                    id="exampleInputPassword" name="password" placeholder="Password">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="button"
                                                        id="togglePassword"
                                                        style="border-top-right-radius: 10rem; border-bottom-right-radius: 10rem;">
                                                        <i class="fa fa-eye" id="togglePasswordIcon"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputConfirmPassword" name="password_confirmation"
                                                placeholder="Confirm Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Register
                                        </button>
                                        <hr>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer_script')
  <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.querySelector('#exampleInputPassword');
        const togglePasswordButton = document.querySelector('#togglePassword');
        const togglePasswordIcon = document.querySelector('#togglePasswordIcon');

        togglePasswordButton.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordIcon.classList.remove('fa-eye');
                togglePasswordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                togglePasswordIcon.classList.remove('fa-eye-slash');
                togglePasswordIcon.classList.add('fa-eye');
            }
        });
    });
</script>
<script>
    $(function() {
        $('.datepicker').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
        });
    });
</script>


</html>
