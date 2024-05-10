<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\AssignmentUpload;
use App\Models\Batch;
use App\Models\ClassModel;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Exception;

class AssignmentUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $assignments = DB::table('assignments_upload')
                ->leftJoin('courses', 'courses.id', '=', 'assignments_upload.courseId')
                ->leftJoin('batches', 'batches.id', '=', 'assignments_upload.batchId')
                ->leftJoin('teachers', 'teachers.id', '=', 'assignments_upload.teacherId')
                ->select('assignments_upload.*', 'courses.name as course_name', 'batches.batchName as batch_name', 'teachers.TeacherName as teacher_name')
                ->get();
                return view('teacher.assignmentUpload.index', compact('assignments'));
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
        $is_approved = CommonController::ApprovalStatus();

        $course =
            ['' => 'Select Program....'] +
            Course::select('id', 'name')
            ->where('is_active', 1)
            ->get()
            ->pluck('name', 'id')
            ->toArray();
        $batch =
        ['' => 'Select Batch....'] +
            Batch::select('id', 'batchName')
            ->where('is_active', 1)
            ->get()
            ->pluck('batchName', 'id')
            ->toArray();
        // dd($batch,$teacher);
        return view('teacher.assignmentUpload.create', compact('is_approved', 'course', 'batch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   
                $request->validate([
                    'title' => 'required|string',
                    'courseId' => 'required',
                    'batchId' => 'required',
                    'classId' => 'required',
                    'assignmentDate' => 'required|date',
                    // 'file' => 'required|file|mimes:pdf,doc,docx,txt',
                ]);
        
                // Handle file upload
                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    $fileName = time() . '_' . $file->getClientOriginalName();
                    $file->move('uploads/assignments', $fileName);
                }
                
                $teacher = Auth::guard('teacher')->user();
                $teacherId = $teacher->id;
                // Create a new Assignment model and save it
                $assignment = new AssignmentUpload();
                $assignment->title = $request->input('title');
                $assignment->courseId = $request->input('courseId');
                $assignment->batchId = $request->input('batchId');
                $assignment->classId = $request->input('classId');
                $assignment->teacherId = $teacherId;
                $assignment->assignmentDate = $request->input('assignmentDate');
                $assignment->status = 0;
                $assignment->file = $fileName;
                $assignment->save();
                // return redirect()->back()->with('success', 'Assignment created successfully');
                return redirect()->route('upload_assignment.index')->with('success', 'Assignment created successfully');
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

    public function getClasses($batchId)
    {
        $teacher = Auth::guard('teacher')->user();
        $teacherId = $teacher->id;

        $classes = ClassModel::where('batchId', $batchId)->where('teacherId', $teacherId)->pluck('classNo','id');
        return response()->json($classes);
    }
}
