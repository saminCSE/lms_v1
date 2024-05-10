<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\ClassModel;
use App\Models\Course;
use App\Models\StudentAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentAttendanceController extends Controller
{
    public function StudentAttendance(Request $request)
{
    $teacher = Auth::guard('teacher')->user();
    $teacherId = $teacher->id;

    $courseId = '';
    $batchId = '';
    $classNo = '';
    $course = ['' => 'Select Program....'] + Course::select('id', 'name')->where('is_active', 1)->get()->pluck('name', 'id')->toArray();
    $batch = ['' => 'Select Batch....'] + Batch::select('id', 'batchName')->where('is_active', 1)->get()->pluck('batchName', 'id')->toArray();
    $collections = [];

    if ($request->isMethod('POST')) {

        $teacher = Auth::guard('teacher')->user();
        $teacherId = $teacher->id;
        $courseId = $request->courseId;
        $batchId = $request->batchId;
        $classNo = $request->classNo;

        $course = ['' => 'Select Program....'] + Course::select('id', 'name')->where('is_active', 1)->get()->pluck('name', 'id')->toArray();
        $batch = ['' => 'Select Batch....'] + Batch::select('id', 'batchName')->where('is_active', 1)->get()->pluck('batchName', 'id')->toArray();

        $student = DB::table('enrollments')
            ->leftJoin('students', 'students.id', 'enrollments.studentId')
            ->leftJoin('batches', 'batches.id', 'enrollments.batchId')
            ->leftJoin('classes', 'classes.batchId', 'enrollments.batchId')
            ->leftJoin('courses', 'courses.id', 'enrollments.courseId')
            ->where('classes.teacherId', $teacherId)
            ->orderBy('classes.id', 'ASC')
            ->select(
                'enrollments.studentId as student_id',
                'enrollments.courseId as course_id',
                'enrollments.batchId as batch_id',
                'classes.startTime',
                'classes.endTime',
                'classes.classTitle',
                'classes.classNo',
                'courses.name as course_name',
                'batches.batchName as batch_name',
                'students.StudentName as student_name'
            );

        if ($courseId) {
            $student->where('enrollments.courseId', $courseId);
        }
        if ($classNo) {
            $student->where('classes.classNo', $classNo);
        }
        if ($batchId) {
            $student->where('enrollments.batchId', $batchId);
        }

        $collections = $student->get();
    }
    return view('teacher.attendance.index', compact('course', 'batch', 'batchId', 'courseId', 'classNo', 'collections'));
}


    public function AttendanceUpdate(Request $request)
    {

        //dd($request);
        $studentId = $request->input('studentId');
        $courseId = $request->input('courseId');
        $batchId = $request->input('batchId');
        $classNo = $request->input('classNo');
        $isPresent = $request->input('is_present');
        $attendance_date=$request->input('attendance_date');
        
        StudentAttendance::updateOrInsert(
            ['studentId' => $studentId, 'courseId' => $courseId, 'batchId' => $batchId,'classNo'=>$classNo,'attendance_date'=>$attendance_date],
            ['is_present' => $isPresent]
        );
        return response()->json(['status' => 'success']);
    }

    public function getBatches($courseId)
    {
        
        $batches = Batch::where('courseId', $courseId)->pluck('batchName', 'id');
        return response()->json($batches);
    }

    public function getClasses($batchId)
    {
        $teacher = Auth::guard('teacher')->user();
        $teacherId = $teacher->id;

        $classes = ClassModel::where('batchId', $batchId)->where('teacherId', $teacherId)->pluck('classNo');
        return response()->json($classes);
    }

}
