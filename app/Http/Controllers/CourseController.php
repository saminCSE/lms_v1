<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Course;
use App\Models\Program;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = DB::table('courses')
                ->leftJoin('programs', 'programs.id', '=', 'courses.programsId')
                ->select('courses.*', 'programs.name as programs_name')
                ->get();

            // Count the number of courses with associated programs.id
            $coursesWithProgramsCount = Course::whereNotNull('programsId')->count();
            // dd($coursesWithProgramsCount);
            // dd($data);
            return view('admin.course.index', compact('data'));
        } catch (Exception $e) {
            // Handle the exception here, e.g., log it
            abort(404, $e->getMessage()); // Abort the request with a 404 status code and exception message
            // Uncomment the line below if you want to display the error message in the admin.course.index view.
            // return view('admin.course.index', compact('data'));
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
        $program =
            ['' => 'Select Program....'] +
            Program::select('id', 'name')
                ->where('is_active', 1)
                ->get()
                ->pluck('name', 'id')
                ->toArray();
        return view('admin.course.create', compact('is_active', 'program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        // try {

        // } catch (Exception $e) {
        //     Session::flash('error', 'Something went wrong');
        //     return redirect()->back();
        // }

        $data = $request->all();

        if ($request->hasFile('course_image_1')) {
            // $this->updateImage($user, 'course_image_1', $request->file('course_image_1'));

            $course_image = $request->file('course_image_1');
            $normalTimestamp = now()->timestamp;
            $normalExtension = $course_image->getClientOriginalExtension();
            $course_imageName = 'course_image_1_' . $normalTimestamp . '.' . $normalExtension;

            // Move and save the image
            $course_imagePath = $course_image->storeAs('public/img', $course_imageName);
            $data['course_image_1'] = $course_imageName;
        }
        $user = Course::create($data);
        // $user = '';

        if (!$user) {
            Session::flash('error', 'Failed to create a new course');
            return redirect()->back();
        }
        Session::flash('status', 'New Course Created Successfully');
        return redirect()->route('course.index');
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
    public function edit(Course $course)
    {


        $is_active = CommonController::ActiveStatus();
        $program =
            ['' => 'Select Program....'] +
            Program::select('id', 'name')
                ->where('is_active', 1)
                ->get()
                ->pluck('name', 'id')
                ->toArray();
        return view('admin.course.create')->with(['item' => $course, 'is_active' => $is_active, 'program' => $program]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {

        // dd($course);
        // try {
        //     $course->update($request->all());

        //     if ($request->is_default) {
        //         Course::where('id', '!=', $course->id)->update(['is_default' => 0]);
        //     }
        //     if (!$course) {
        //         Session::flash('error', 'An error occurred');
        //         return redirect()->back();
        //     }
        //     return redirect()
        //         ->route('course.index')
        //         ->with('status', 'Course Update Successfully');
        // } catch (Exception $e) {
        //     // Handle exceptions if any occur during the update
        //     Session::flash('error', 'An error occurred: ' . $e->getMessage());
        //     return redirect()->route('course.index'); // Redirect back to the course index page with an error message
        // }

        // $course->update($request->all());
        $course->fill($request->except(['course_image_1']));
        $course->save();

        if ($request->is_default) {
            Course::where('id', '!=', $course->id)->update(['is_default' => 0]);
        }
        if (!$course) {
            Session::flash('error', 'An error occurred');
            return redirect()->back();
        }
        if ($request->hasFile('course_image_1')) {
            $this->updateImage($course, 'course_image_1', $request->file('course_image_1'));
        }
        return redirect()
            ->route('course.index')
            ->with('status', 'Course Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $this->deleteImage($course, 'course_image_1');
        $course->delete();
        return redirect()
            ->back()
            ->with('delete_status', 'Course Delete Successfully');
    }

    // Add this method to handle image updates
    private function updateImage(Course $course, $imageField, $file)
    {
        // dd($course);        // Delete the old image if it exists
        if ($course->$imageField) {
            Storage::delete('public/img/' . $course->$imageField);
            // Storage::delete('public/img/' . $course->$imageField->hashName());
            // dd($course->$imageField);
        }

        // Upload the new image
        $timestamp = now()->timestamp;
        $extension = $file->getClientOriginalExtension();
        $imageName = $imageField . '_' . $timestamp . '.' . $extension;
        // dd($file->hashName());
        $file->storeAs('public/img', $imageName);

        // // Move and save the image
        // $course_imagePath = $file->storeAs('public/img', $file);
        // $course['course_image_1'] = $file;

        // Update the course with the new image name
        $course->$imageField = $imageName;
        $course->save();
    }

    // Add this method to delete an image
    private function deleteImage(Course $course, $imageField)
    {
        if ($course->$imageField) {
            Storage::delete('public/img/' . $course->$imageField);
        }
    }
}
