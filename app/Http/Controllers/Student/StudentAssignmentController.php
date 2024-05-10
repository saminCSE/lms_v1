<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use Hamcrest\Core\HasToString;

class StudentAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Auth::guard('student')->user();
        $studentId = $student->id;
        
        $courseId = DB::table('enrollments')
            ->join('courses', 'enrollments.courseId', '=', 'courses.id')
            ->where('enrollments.studentId', $studentId)
            ->select('courses.id')
            ->distinct()
            ->get()
            ->pluck('id'); 
        
        $batchId = DB::table('enrollments')
            ->join('batches', 'enrollments.batchId', '=', 'batches.id')
            ->where('enrollments.studentId', $studentId)
            ->select('batches.id')
            ->distinct()
            ->get()
            ->pluck('id');
        
        try {
            $assignments = DB::table('assignments_upload')
                ->leftJoin('courses', 'courses.id', '=', 'assignments_upload.courseId')
                ->leftJoin('batches', 'batches.id', '=', 'assignments_upload.batchId')
                ->leftJoin('teachers', 'teachers.id', '=', 'assignments_upload.teacherId')
                ->whereIn('assignments_upload.courseId', $courseId)
                ->whereIn('assignments_upload.batchId', $batchId)
                ->where('assignments_upload.status', 1)
                ->select('assignments_upload.*', 'courses.name as course_name', 'batches.batchName as batch_name', 'teachers.TeacherName as teacher_name')
                ->get();
        
            //dd($assignments);
             return view('student.assignment.index', compact('assignments'));
        } catch (Exception $e) {
            // Handle the exception here, e.g., log it
            abort(404, $e->getMessage());
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
