<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Models\Batch;
use App\Models\ClassModel;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = DB::table('enrollments')
                ->leftJoin('courses', 'courses.id', '=', 'enrollments.courseId')
                ->leftJoin('batches', 'batches.id', '=', 'enrollments.batchId')
                ->leftJoin('students', 'students.id', '=', 'enrollments.studentId')
                ->select('enrollments.*', 'courses.name as course_name', 'batches.batchName as batch_name', 'students.StudentName as student_name', 'students.Email as student_email')
                ->get();
            return view('admin.enrollment.index', compact('data'));
        } catch (Exception $e) {
            // Handle the exception here, e.g., log it
            abort(404, $e->getMessage()); // Abort the request with a 404 status code and exception message
            // Uncomment the line below if you want to display the error message in the admin.enrollment.index view.
            // return view('admin.enrollment.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enroll_status = CommonController::EnrollStatus();
        $payment_status = CommonController::PaymentStatus();
        $contact_status = CommonController::ContactStatus();
        $course = ['' => 'Select Course....'] + Course::select('id', 'name')->where('is_active', 1)->get()->pluck('name', 'id')->toArray();
        $batch = ['' => 'Select Batch....'] + Batch::select('id', 'batchName')->where('is_active', 1)->get()->pluck('batchName', 'id')->toArray();
        $student = ['' => 'Select Student....'] + Student::select('id', 'StudentName')->get()->pluck('StudentName', 'id')->toArray();
        $StudentEmail = ['' => 'Select Student Email....'] + Student::select('id','Email')->get()->pluck('Email','id')->toArray();
        return view('admin.enrollment.create', compact('enroll_status', 'payment_status', 'contact_status', 'course', 'batch', 'student', 'StudentEmail'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnrollmentRequest $request)
    {
        try {
            $data = $request->all();
            $user = Enrollment::create($data);

            if (!$user) {
                Session::flash('error', 'An error occurred');
                return redirect()->route('enrolled_student.create');
            }

            Session::flash('message', 'Student Enrolled Successfully');
            return redirect()->route('enrolled_student.index');
        } catch (Exception $e) {
            // Handle other exceptions
            Session::flash('error', 'An error occurred: ' . $e->getMessage());
            return redirect()->route('enrolled_student.create'); // Redirect back to the enrolled_student create page with an error message
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Enrollment $enrolled_student)
    {
        $enroll_status = CommonController::EnrollStatus();
        $payment_status = CommonController::PaymentStatus();
        $contact_status = CommonController::ContactStatus();
        $course = ['' => 'Select Program....'] + Course::select('id', 'name')->where('is_active', 1)->get()->pluck('name', 'id')->toArray();
        $batch = ['' => 'Select Batch....'] + Batch::select('id', 'batchName')->where('is_active', 1)->get()->pluck('batchName', 'id')->toArray();
        $student = ['' => 'Select Student....'] + Student::select('id', 'StudentName')->get()->pluck('StudentName', 'id')->toArray();
        $StudentEmail = ['' => 'Select Student Email....'] + Student::select('Email')->get()->pluck('Email')->toArray();
        return view('admin.enrollment.create')->with(['item' => $enrolled_student, 'enroll_status' => $enroll_status, 'payment_status' => $payment_status, 'contact_status' => $contact_status, 'course' => $course, 'batch' => $batch, 'student' => $student, 'StudentEmail' => $StudentEmail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnrollmentRequest $request, Enrollment $enrolled_student)
    {
        try {
            $enrolled_student->update($request->all());

            if ($request->is_default) {
                Enrollment::where('id', '!=', $enrolled_student->id)->update(['is_default' => 0]);
            }

            if (!$enrolled_student) {
                Session::flash('error', 'An error occurred');
                return redirect()->back();
            }

            return redirect()->route('enrolled_student.index')->with('status', 'Student Enrollment Update Successfully');
        } catch (Exception $e) {
            // Handle other exceptions
            Session::flash('error', 'An error occurred: ' . $e->getMessage());
            return redirect()->route('enrolled_student.index'); // Redirect back to the enrolled_student index page with an error message
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enrollment $enrolled_student)
    {
        $enrolled_student->delete();
        return redirect()->back()->with('delete_status', 'Student Enrollment Delete Successfully');
    }

    public function getBatches($courseId)
    {
        $batches = Batch::where('courseId', $courseId)->pluck('batchName', 'id');
        return response()->json($batches);
    }

    public function getStudentName($studentEmail)
    {
        $student = Student::where('id', $studentEmail)->first();
        return response()->json($student);
    }

    public function getClasses($batchId)
    {
        $classes = ClassModel::where('batchId', $batchId)->pluck('classNo');
        return response()->json($classes);
    }
}
