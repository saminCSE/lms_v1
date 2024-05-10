<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseLecture;
use App\Models\CourseSection;

class CourseSectionController extends Controller
{
    public function AddCourseLecture($id)
    {

        $course = Course::find($id);

        // return view('admin.course.section.add_course_lecture', compact('course'));
        $section = CourseSection::where('course_id', $id)->latest()->get();

        return view('admin.course.section.add_course_lecture', compact('course', 'section'));

    }

    public function AddCourseSection(Request $request)
    {

        $cid = $request->id;

        CourseSection::insert([
            'course_id' => $cid,
            'section_title' => $request->section_title,
        ]);

        $notification = array(
            'message' => 'Course Section Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function SaveLecture(Request $request)
    {

        $lecture = new CourseLecture();
        $lecture->course_id = $request->course_id;
        $lecture->section_id = $request->section_id;
        $lecture->lecture_title = $request->lecture_title;
        $lecture->url = $request->lecture_url;
        $lecture->content = $request->content;
        $lecture->save();

        return response()->json(['success' => 'Lecture Saved Successfully']);

    }

    public function EditLecture($id)
    {

        $clecture = CourseLecture::find($id);
        // $clecture = CourseLecture::where('id', $id)->while_where('id', $id);
        return view('admin.course.lecture.edit_course_lecture', compact('clecture'));

    }

    public function UpdateCourseLecture(Request $request)
    {
        $lid = $request->id;

        CourseLecture::find($lid)->update([
            'lecture_title' => $request->lecture_title,
            'url' => $request->url,
            'content' => $request->content,

        ]);

        $notification = array(
            'message' => 'Course Lecture Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function DeleteLecture($id)
    {

        CourseLecture::find($id)->delete();

        $notification = array(
            'message' => 'Course Lecture Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function DeleteSection($id)
    {

        $section = CourseSection::find($id);

        /// Delete reated lectures
        $section->lectures()->delete();
        // Delete the section
        $section->delete();

        $notification = array(
            'message' => 'Course Section Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
}
