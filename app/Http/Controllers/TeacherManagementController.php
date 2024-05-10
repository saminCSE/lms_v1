<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TeacherManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('teachers')
            ->select('teachers.*', 'teachers.TeacherName as teacher_name', 'teachers.Email as teacher_email', 'teachers.password as teacher_password', 'teachers.PhoneNo as teacher_phone')
            ->get();
        return view('admin.teacherManagement.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacherManagement.create');
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
            // 'password' => 'required|min:8',
            // 'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
            'password' => ['required', 'min:8', 'custom_password_rule'],
            // Add your desired password validation rules here
            'confirm_password' => 'required|same:password',
            'Email' => 'required|email|unique:teachers',
        ]);
        $data = $request->all();
        $user = Teacher::create($data);
        // $user = '';

        if (!$user) {
            Session::flash('error', 'An error occurred');
            return redirect()->route('teacher_management.create');
        }

        Session::flash('status', 'New Teacher Added Successfully');
        return redirect()->route('teacher_management.index');
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
    public function edit(Teacher $teacher_management)
    {
        return view('admin.teacherManagement.create')->with(['item' => $teacher_management]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher_management)
    {
        $request->validate([
            // 'password' => 'required|min:8',
            // 'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'],
            'password' => ['required', 'min:8', 'custom_password_rule'],
            // Add your desired password validation rules here
            'confirm_password' => 'required|same:password',
            'Email' => 'required|email|unique:teachers,email,' . $teacher_management->id,
        ]);
        $teacher_management->update($request->all());

        if ($request->is_default) {
            Course::where('id', '!=', $teacher_management->id)->update(['is_default' => 0]);
        }

        if (!$teacher_management) {
            Session::flash('error', 'An error occurred');
            return redirect()->back();
        }

        return redirect()
            ->route('teacher_management.index')
            ->with('status', 'Teacher Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher_management)
    {
        // Get the teacher ID from the provided Teacher model
        $teacherId = $teacher_management->id;

        // Delete related records in 'classes' table with foreign key constraints
        DB::table('classes')
            ->where('teacherId', $teacherId)
            ->delete();

        // Delete related records in 'teacherspercourse' table with foreign key constraints
        DB::table('teacherspercourse')
            ->where('teacherId', $teacherId)
            ->delete();

        // Now, you can safely delete the teacher
        $teacher_management->delete();

        return redirect()
            ->back()
            ->with('delete_status', 'Teacher Delete Successfully');
    }
}