<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <title>Wings Learning</title>
    @include('layouts.header')
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand " href="/AdminDashboard">
                <div class="sidebar-brand-text mx-3">Wings Learning</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/AdminDashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Admin Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Administrative Control</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('heroedit') }}">Hero Section Edit</a>
                        <a class="collapse-item" href="{{ route('assignment_management.index') }}">Content Approval</a>
                        <a class="collapse-item" href="utilities-border.html">Set Offers</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="true" aria-controls="collapseUser">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>User Management</span>
                </a>
                <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/login">Add/Create User</a>
                        <a class="collapse-item" href="/login">User List </a>
                        <a class="collapse-item" href="/login/admin">Login</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole"
                    aria-expanded="true" aria-controls="collapseRole">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Role Management</span>
                </a>
                <div id="collapseRole" class="collapse" aria-labelledby="headingRole" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="/login">Add/Create Role</a>
                        <a class="collapse-item" href="/login">List Screen of all Roles</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#assignmentManagement"
                    aria-expanded="true" aria-controls="collapseRole">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Assignment</span>
                </a>
                <div id="assignmentManagement" class="collapse" aria-labelledby="headingRole"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('assignment_management.create') }}">Add Assignment</a>
                        <a class="collapse-item" href="{{ route('assignment_management.index') }}">Manage Assignment</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#studentRole"
                    aria-expanded="true" aria-controls="collapseRole">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Student Management</span>
                </a>
                <div id="studentRole" class="collapse" aria-labelledby="headingRole"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('student_management.create') }}">Add Student</a>
                        <a class="collapse-item" href="{{ route('student_management.index') }}">Student List</a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#teacherRole"
                    aria-expanded="true" aria-controls="collapseRole">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Teacher Management</span>
                </a>
                <div id="teacherRole" class="collapse" aria-labelledby="headingRole"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('teacher_management.create') }}">Add Teacher</a>
                        <a class="collapse-item" href="{{ route('teacher_management.index') }}">Teacher List</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#examRole"
                    aria-expanded="true" aria-controls="collapseRole">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Exam Management</span>
                </a>
                <div id="examRole" class="collapse" aria-labelledby="headingRole" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('examday_management.create') }}">Manage Exam Date</a>
                        <a class="collapse-item" href="{{ route('examday_management.index') }}">Exam List</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#programRole"
                    aria-expanded="true" aria-controls="collapseRole">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Program Management</span>
                </a>
                <div id="programRole" class="collapse" aria-labelledby="headingRole"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('program.create') }}">Create Program</a>
                        <a class="collapse-item" href="{{ route('program.index') }}">Manage List</a>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#courseRole"
                    aria-expanded="true" aria-controls="collapseRole">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Course Management</span>
                </a>
                <div id="courseRole" class="collapse" aria-labelledby="headingRole" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('course.create') }}">Create Course</a>
                        <a class="collapse-item" href="{{ route('course.index') }}">Manage List</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#batchRole"
                    aria-expanded="true" aria-controls="collapseRole">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Batch Management</span>
                </a>
                <div id="batchRole" class="collapse" aria-labelledby="headingRole" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('batch.create') }}">Create Batch</a>
                        <a class="collapse-item" href="{{ route('batch.index') }}">Manage List</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#classRole"
                    aria-expanded="true" aria-controls="collapseRole">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Class Management</span>
                </a>
                <div id="classRole" class="collapse" aria-labelledby="headingRole" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('class.create') }}">Create Class</a>
                        <a class="collapse-item" href="{{ route('class.index') }}">Manage List</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#enrollRole"
                    aria-expanded="true" aria-controls="collapseRole">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Student Enrollment</span>
                </a>
                <div id="enrollRole" class="collapse" aria-labelledby="headingRole" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('enrolled_student.create') }}">Enroll</a>
                        <a class="collapse-item" href="{{ route('enrolled_student.index') }}">Manage List</a>
                    </div>
                </div>
            </li>



            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="gh">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button> -->
                    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->
                    <ul class="navbar-nav ml-auto">

                        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li> -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ \Auth::guard('admin')->user()->name }}</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
            </div>

            @yield('content')

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; WINGS LEARNING CENTRE@2023</span>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/logout/admin">Logout</a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer_script')
</body>

</html>
