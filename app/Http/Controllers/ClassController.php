<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassRequest;
use App\Models\Batch;
use App\Models\ClassModel;
use App\Models\Course;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = DB::table('classes')
                ->leftJoin('courses', 'courses.id', '=', 'classes.courseId')
                ->leftJoin('batches', 'batches.id', '=', 'classes.batchId')
                ->leftJoin('teachers', 'teachers.id', '=', 'classes.teacherId')
                ->select('classes.*', 'courses.name as course_name', 'batches.batchName as batch_name', 'teachers.TeacherName as teacher_name')
                ->get();
            return view('admin.class.index', compact('data'));
        } catch (Exception $e) {
            // Handle the exception here, e.g., log it
            abort(404, $e->getMessage()); // Abort the request with a 404 status code and exception message
            // Uncomment the line below if you want to display the error message in the admin.class.index view.
            // return view('admin.class.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $is_active = CommonController::ActiveStatus();
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
        $teacher =
            ['' => 'Select Teacher....'] +
            Teacher::select('id', 'TeacherName')
                ->get()
                ->pluck('TeacherName', 'id')
                ->toArray();
        // dd($batch,$teacher);
        return view('admin.class.create', compact('is_active', 'course', 'batch', 'teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRequest $request)
    {
        try {
            $data = $request->all();
            $user = ClassModel::create($data);
            // $user = '';

            if (!$user) {
                Session::flash('error', 'An error occurred');
                return redirect()->route('class.create');
            }

            Session::flash('status', 'New Class Created Successfully');
            return redirect()->route('class.index');
        } catch (Exception $e) {
            // Handle other exceptions
            Session::flash('error', 'An error occurred: ' . $e->getMessage());
            return redirect()->route('class.create'); // Redirect back to the class create page with an error message
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
    public function edit(ClassModel $class)
    {
        $is_active = CommonController::ActiveStatus();
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
        $teacher =
            ['' => 'Select Teacher....'] +
            DB::table('teachers')
                ->select('id', 'TeacherName')
                ->get()
                ->pluck('TeacherName', 'id')
                ->toArray();
        return view('admin.class.create')->with(['item' => $class, 'is_active' => $is_active, 'course' => $course, 'batch' => $batch, 'teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassRequest $request, ClassModel $class)
    {
        try {
            $class->update($request->all());

            if ($request->is_default) {
                Course::where('id', '!=', $class->id)->update(['is_default' => 0]);
            }

            if (!$class) {
                Session::flash('error', 'An error occurred');
                return redirect()->back();
            }

            return redirect()
                ->route('class.index')
                ->with('status', 'Class Update Successfully');
        } catch (Exception $e) {
            // Handle exceptions if any occur during the update
            Session::flash('error', 'An error occurred: ' . $e->getMessage());
            return redirect()->route('class.index'); // Redirect back to the class index page with an error message
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassModel $class)
    {
        $class->delete();
        return redirect()
            ->back()
            ->with('delete_status', 'Class Delete Successfully');
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

        $classes = ClassModel::where('batchId', $batchId)->where('teacherId', $teacherId)->pluck('classNo','id');
        return response()->json($classes);
    }
}