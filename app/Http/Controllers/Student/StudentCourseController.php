<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentCourseController extends Controller
{
    public function index()
    {
        try {
            $student = Auth::guard('student')->user();
            $studentId = $student->id;
            $data = DB::table('enrollments')
                ->join('courses', 'enrollments.courseId', '=', 'courses.id')
                ->join('batches', 'enrollments.batchId', '=', 'batches.id')
                ->where('enrollments.studentId', $studentId)
                ->select('courses.name as course_name', 'batches.batchName as batch_name', 'enrollments.enrollStatus', 'enrollments.enrollmentDate', 'enrollments.amount', 'enrollments.paymentStatus')
                ->get();
            return view('student.courses.index', compact('data'));
        } catch (Exception $e) {
            abort(404, $e->getMessage());
        }
    }
}