<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Course;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentManagementController extends Controller
{
    public function index()
    {
        try {
            $data = DB::table('students')
                ->select('students.*', 'students.StudentName as student_name', 'students.Email as student_email', 'students.password as student_password', 'students.BirthDate as student_birthdate', 'students.PhoneNo as student_phone')
                ->get();
            return view('admin.studentManagement.index', compact('data'));
        } catch (Exception $e) {
            // Handle the exception here, e.g., log it
            abort(404, $e->getMessage()); // Abort the request with a 404 status code and exception message
            // Uncomment the line below if you want to display the error message in the student.courses.index view.
            // return view('admin.studentManagement.index', compact('data'));
        }
    }

    public function create()
    {
        return view('admin.studentManagement.create');
    }

    public function store(StudentRequest $request)
    {
        $request->validate([
            // 'password' => 'required|min:8',
            // 'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
            'password' => ['required', 'min:8', 'custom_password_rule'],
            // Add your desired password validation rules here
            'confirm_password' => 'required|same:password',
            'Email' => 'required|email|unique:students',
        ]);
        $data = $request->all();
        $user = Student::create($data);
        // $user = '';

        if (!$user) {
            Session::flash('error', 'An error occurred');
            return redirect()->route('student_management.create');
        }

        Session::flash('status', 'New Student Added Successfully');
        return redirect()->route('student_management.index');
    }

    public function edit(Student $student_management)
    {
        return view('admin.studentManagement.create')->with(['item' => $student_management]);
    }

    public function update(StudentRequest $request, Student $student_management)
    {
        $request->validate([
            // 'password' => 'required|min:8',
            // 'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
            'password' => ['required', 'min:8', 'custom_password_rule'],
            // Add your desired password validation rules here
            'confirm_password' => 'required|same:password',
            'Email' => 'required|email|unique:students,email,' . $student_management->id,
        ]);
        $student_management->update($request->all());

        if ($request->is_default) {
            Course::where('id', '!=', $student_management->id)->update(['is_default' => 0]);
        }

        if (!$student_management) {
            Session::flash('error', 'An error occurred');
            return redirect()->back();
        }

        return redirect()
            ->route('student_management.index')
            ->with('status', 'Student Update Successfully');
    }

    public function destroy(Student $student_management)
    {
        // Get the student ID from the provided Student model
        $studentId = $student_management->id;

        // Delete related records in enrollments table for the specified student ID
        DB::table('enrollments')
            ->where('studentId', $studentId)
            ->delete();

        // Now, you can safely delete the student
        $student_management->delete();

        return redirect()
            ->back()
            ->with('delete_status', 'Student Delete Successfully');
    }
}