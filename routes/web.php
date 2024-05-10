<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentLoginController;
use App\Http\Controllers\TeacherLoginController;
use App\Http\Controllers\CourseSectionController;
use App\Http\Controllers\ExamManagementController;
use App\Http\Controllers\MainPageDynamicController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\StudentAttendanceController;
use App\Http\Controllers\StudentManagementController;
use App\Http\Controllers\TeacherManagementController;
use App\Http\Controllers\AdminAssignmentUploadController;
use App\Http\Controllers\Student\StudentCourseController;
use App\Http\Controllers\Teacher\AssignmentUploadController;
use App\Http\Controllers\Student\StudentAssignmentController;
use Faker\Guesser\Name;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    return view('welcomecopy');
});

Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::get('/about', [HomeController::class, 'About'])->name('about');
Route::get('/calendar', [HomeController::class, 'Calendar'])->name('calendar');
// Route::get('/course_details', [HomeController::class, 'CourseDetails'])->name('course-details');
Route::get('/course/{course_id}', [HomeController::class, 'CourseDetails'])->name('course_details');
Route::get('/alumni', [HomeController::class, 'Alumni'])->name('alumni');



Route::group(['middleware' => 'web'], function () {

    // Route::get('/AdminDashboard', [HomeController::class, 'Dashboard']);
    // Route::get('logout', [AdminLoginController::class, 'logout']);

});

Route::group(['middleware' => 'admin'], function () {
    Route::resource('admin/course', CourseController::class);
    Route::resource('admin/program', ProgramController::class);
    Route::resource('admin/batch', BatchController::class);
    Route::resource('admin/class', ClassController::class);
    Route::resource('admin/student_management', StudentManagementController::class);
    Route::resource('admin/teacher_management', TeacherManagementController::class);
    Route::get('/AdminDashboard', [HomeController::class, 'AdminDashboard']);
    Route::get('/logout/admin', [AdminLoginController::class, 'logout']);
    Route::resource('examday_management', ExamManagementController::class);
    Route::resource('enrolled_student', EnrollmentController::class);
    Route::get('get-batches/{courseId}', [EnrollmentController::class, 'getBatches']);
    Route::get('get-classes-admin/{batchId}', [EnrollmentController::class, 'getClasses']);
    Route::get('get-classes/{batchId}', [ClassController::class, 'getClasses']);
    Route::get('/get-student-name/{studentEmail}', [EnrollmentController::class, 'getStudentName']);
    Route::resource('assignment_management', AdminAssignmentUploadController::class);
    Route::post('/assignment/update', [AdminAssignmentUploadController::class, 'AssignmentUpdate']);
    Route::get('/heroedit', [MainPageDynamicController::class, 'heroedit'])->name('heroedit');
    Route::post('/submit_hero', [MainPageDynamicController::class, 'submit_hero'])->name('submit_hero');
    Route::get('/add/course/lecture/{id}', [CourseSectionController::class, 'addCourseLecture'])->name('add.course.lecture');
    Route::post('/add/course/section', [CourseSectionController::class, 'AddCourseSection'])->name('add.course.section');
    Route::post('/save-lecture/', [CourseSectionController::class, 'SaveLecture'])->name('save-lecture');
    Route::get('/edit/lecture/{id}', [CourseSectionController::class, 'EditLecture'])->name('edit.lecture');
    Route::post('/update/course/lecture', [CourseSectionController::class, 'UpdateCourseLecture'])->name('update.course.lecture');
    Route::get('/delete/lecture/{id}', [CourseSectionController::class, 'DeleteLecture'])->name('delete.lecture');
    Route::post('/delete/section/{id}', [CourseSectionController::class, 'DeleteSection'])->name('delete.section');
});

Route::group(['middleware' => 'teacher'], function () {
    // Teacher dashboard
    Route::get('/TeacherDashboard', [HomeController::class, 'TeacherDashboard']);
    Route::get('/logout/teacher', [TeacherLoginController::class, 'logout']);
    Route::match(['get', 'post'], '/studentAttendance', [StudentAttendanceController::class, 'StudentAttendance'])->name('student_attendance');
    Route::post('/attendance/update', [StudentAttendanceController::class, 'AttendanceUpdate']);
    Route::get('get-stduent-batches/{courseId}', [StudentAttendanceController::class, 'getBatches']);
    Route::get('get-student-classes/{batchId}', [StudentAttendanceController::class, 'getClasses']);
    Route::get('get-assignment-classes/{batchId}', [AssignmentUploadController::class, 'getClasses']);
    Route::resource('upload_assignment', AssignmentUploadController::class);
});

Route::group(['middleware' => 'student'], function () {
    // Student dashboard
    Route::get('/StudentDashboard', [HomeController::class, 'StudentDashboard'])->name('studentDashboard');
    Route::get('/logout/student', [StudentLoginController::class, 'logout'])->name('student.logout');
    Route::resource('student/courses', StudentCourseController::class);
    Route::resource('student_assignment', StudentAssignmentController::class);
    Route::post('/example1/{course_id}', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('checkout_easy');

});

Route::get('/login/admin', [AdminLoginController::class, 'Login'])->name('admin.login')->middleware('AdminAlreadyLoggedIn');
Route::post('admin_login', [AdminLoginController::class, 'adminLogin']);

Route::get('/login/teacher', [TeacherLoginController::class, 'Login'])->middleware('TeacherAlreadyLoggedIn');
Route::post('teacher_login', [TeacherLoginController::class, 'teacherLogin'])->name('teacher.login');

Route::get('/login/student', [StudentLoginController::class, 'Login'])->name('student.login')->middleware('StudentAlreadyLoggedIn');
Route::post('student_login', [StudentLoginController::class, 'studentLogin'])->name('student_login');

Route::get('/register', [StudentLoginController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [StudentLoginController::class, 'register'])->name('student_register');
Route::get('/verify-email', [StudentLoginController::class, 'showEmailVerificationForm'])->name('verification.show');
Route::post('/verify-email', [StudentLoginController::class, 'verifyEmail'])->name('eamil_verifying');


// SSLCOMMERZ Start

Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

// Auth::routes();
