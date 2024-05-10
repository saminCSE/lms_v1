<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function AdminDashboard()
    {
        $teacherCount = Teacher::count();
        $courseCount = Course::count();
        $batchCount = Batch::count();
        $studentCount = Student::count();
        return view('admin.dashboard', compact('teacherCount', 'courseCount', 'batchCount', 'studentCount'));
    }

    public function TeacherDashboard()
    {
        $teacher = Auth::guard('teacher')->user();
        $teacherId = $teacher->id;

        // $studentCount = DB::table('enrollments')
        // ->leftJoin('students', 'students.id', '=', 'enrollments.studentId')
        // ->where('classes.teacherId', $teacherId)->count();

        $courseCount = DB::table('courses')
            ->leftJoin('classes', 'classes.courseId', '=', 'courses.id')
            ->where('classes.teacherId', $teacherId)
            ->distinct()
            ->count('courses.id');

        $batchCount = DB::table('batches')
            ->leftJoin('classes', 'classes.batchId', '=', 'batches.id')
            ->where('classes.teacherId', $teacherId)
            ->count();
        return view('teacher.dashboard', compact('courseCount', 'batchCount'));
    }

    public function StudentDashboard()
    {
        return view('student.dashboard');
    }

    public function Home()
    {
        $hero = Hero::all()->first();
        $programs = DB::table('programs')
            ->leftJoin('courses', 'courses.programsId', '=', 'programs.id')
            ->select('programs.*', DB::raw('COUNT(courses.id) as courses_count'))
            ->groupBy('programs.id')
            ->get();
        // // Initialize an array to store courses_count for each program
        // $coursesCountArray = [];

        // // Fetch the count of courses with associated programs ID
        // foreach ($programs as $program) {
        //     $coursesCount = Course::where('programsId', $program->id)->count();
        //     $program->courses_count = $coursesCount;

        //     // Save courses_count in the array
        //     $coursesCountArray[$program->id] = $coursesCount;
        // }
        // $courses = Course::all();
        $courses = DB::select(DB::raw("
        SELECT
            courses.*,
            MAX(batches.batchName) AS batchName,
            MAX(batches.seatNo) AS availableseat
        FROM
            courses
        LEFT JOIN
            batches ON batches.courseId = courses.id
        GROUP BY
            courses.id
    "));

        // dd($hero);
        // dd($programs);
        // dd($programs->pluck('courses_count'));
        //dd($courses);
        return view('home.layouts.master', compact('hero', 'programs', 'courses'));
    }

    public function About()
    {
        return view('home.pages.about');
    }
    public function Alumni()
    {
        return view('home.pages.alumni');
    }
    public function Calendar()
    {
        return view('home.pages.calendar');
    }

    public function courseDetails($course_id)
    {
        $course = Course::with(['sections', 'lectures'])
            ->select(
                'courses.*',
                DB::raw('MAX(batches.batchName) AS batchName'),
                DB::raw('MAX(batches.seatNo) AS availableseat'),
                DB::raw('MAX(enrollments.status) AS enrollmentStatus'),
                DB::raw('MAX(enrollments.transaction_id) AS transaction_id'),
                DB::raw('MAX(enrollments.studentId) AS studentId')
            )
            ->leftJoin('batches', 'batches.courseId', '=', 'courses.id')
            ->leftJoin('enrollments', 'enrollments.courseId', '=', 'courses.id')
            ->groupBy('courses.id')
            ->where('courses.id', $course_id)
            ->first();

        if (!$course) {
            abort(404); // You can handle this differently based on your application's needs
        }

        return view('home.pages.course_details', ['course' => $course]);


    }
}
