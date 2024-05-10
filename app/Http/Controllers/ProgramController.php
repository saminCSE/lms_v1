<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Course;
use App\Models\Program;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProgramRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     try {
    //         $data = Program::all();

    //         // Initialize an array to store courses_count for each program
    //         $coursesCountArray = [];

    //         // Fetch the count of courses with associated programs ID
    //         foreach ($data as $program) {
    //             $coursesCount = Course::where('programsId', $program->id)->count();
    //             $program->courses_count = $coursesCount;

    //             // Save courses_count in the array
    //             $coursesCountArray[$program->id] = $coursesCount;
    //         }

    //         // dd($data->pluck('courses_count'));

    //         return view('admin.program.index', compact('data', 'coursesCountArray'));
    //     } catch (Exception $e) {
    //         // Handle the exception here, e.g., log it
    //         abort(404, $e->getMessage()); // Abort the request with a 404 status code and exception message
    //         // Uncomment the line below if you want to display the error message in the admin.program.index view.
    //         // return view('admin.program.index', compact('data'));
    //     }
    // }

    public function index()
    {
        try {
            $data = DB::table('programs')
                ->leftJoin('courses', 'courses.programsId', '=', 'programs.id')
                ->select(
                    'programs.*',
                    DB::raw('COUNT(courses.id) as courses_count')
                )
                ->groupBy('programs.id')
                ->get();

            return view('admin.program.index', compact('data'));
        } catch (Exception $e) {
            // Handle the exception here, e.g., log it
            abort(404, $e->getMessage());
            // Uncomment the line below if you want to display the error message in the admin.program.index view.
            // return view('admin.program.index', compact('data'));
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
        return view('admin.program.create', compact('is_active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ProgramRequest $request)
    {
        // Validate the images with custom error messages
        $request->validate(
            [
                'program_normal_image' => ['image', 'dimensions:width=303,height=333'],
                'program_hover_image' => ['image', 'dimensions:width=303,height=376'],
            ],
            [
                'program_normal_image.image' => 'Error Uploading..!! The Normal Image must be a valid image file.',
                'program_normal_image.dimensions' => 'Error Uploading..!! The Normal Image must be exactly 303x333 pixels.',
                'program_hover_image.image' => 'Error Uploading..!! The Hover Image must be a valid image file.',
                'program_hover_image.dimensions' => 'Error Uploading..!! The Hover Image must be exactly 303x376 pixels.',
            ],
        );

        $data = $request->all();

        // Upload program_normal_image
        if ($request->hasFile('program_normal_image')) {
            $normalImage = $request->file('program_normal_image');
            $normalTimestamp = now()->timestamp;
            $normalExtension = $normalImage->getClientOriginalExtension();
            $normalImageName = 'normal_' . $normalTimestamp . '.' . $normalExtension;

            // Move and save the image
            $normalImagePath = $normalImage->storeAs('public/img', $normalImageName);
            $data['program_normal_image'] = $normalImageName;
        }

        // Upload program_hover_image
        if ($request->hasFile('program_hover_image')) {
            $hoverImage = $request->file('program_hover_image');
            $hoverTimestamp = now()->timestamp;
            $hoverExtension = $hoverImage->getClientOriginalExtension();
            $hoverImageName = 'hover_' . $hoverTimestamp . '.' . $hoverExtension;

            // Move and save the image
            $hoverImagePath = $hoverImage->storeAs('public/img', $hoverImageName);
            $data['program_hover_image'] = $hoverImageName;
        }

        // Create a new program record
        $program = Program::create($data);

        if (!$program) {
            Session::flash('error', 'An error occurred');
            return redirect()->route('program.create');
        }

        // Session::flash('status', 'New Program Created Successfully');
        return redirect()
            ->route('program.index')
            ->with('status', 'New Program Created Successfully');
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
    public function edit(Program $program)
    {
        //dd($program);
        $is_active = CommonController::ActiveStatus();
        return view('admin.program.create')->with(['item' => $program, 'is_active' => $is_active]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ProgramRequest $request, Program $program)
    {
        // Check if the name is being updated and if it already exists for other programs
        if ($request->filled('name') && $request->name !== $program->name) {
            $existingProgram = Program::where('name', $request->name)->first();
            if ($existingProgram && $existingProgram->id !== $program->id) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['name' => 'The name has already been taken.']);
            }
        }

        // Validate images only if they are uploaded
        if ($request->hasFile('program_normal_image')) {
            $request->validate([
                'program_normal_image' => 'image|dimensions:width=303,height=333',
            ]);
        }
        if ($request->hasFile('program_hover_image')) {
            $request->validate([
                'program_hover_image' => 'image|dimensions:width=303,height=376',
            ]);
        }

        // Save other updates
        $program->fill($request->except(['program_normal_image', 'program_hover_image']));

        // Save the program model
        $program->save();

        // Update images if they are present in the request
        if ($request->hasFile('program_normal_image')) {
            $this->updateImage($program, 'program_normal_image', $request->file('program_normal_image'));
        }

        if ($request->hasFile('program_hover_image')) {
            $this->updateImage($program, 'program_hover_image', $request->file('program_hover_image'));
        }

        return redirect()
            ->route('program.index')
            ->with('status', 'Program Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Program $program)
    {
        try {
            // Delete program images if they exist
            $this->deleteImage($program, 'program_normal_image');
            $this->deleteImage($program, 'program_hover_image');

            $program->delete();

            return redirect()
                ->back()
                ->with('delete_status', 'Program Deleted Successfully');
        } catch (Exception $e) {
            Session::flash('error', 'An error occurred: ' . $e->getMessage());
            return redirect()->route('program.index');
        }
    }

    /**
     * Update an image for a program.
     *
     * @param  Program  $program
     * @param  string   $imageField
     * @param  \Illuminate\Http\UploadedFile  $file
     * @return void
     */
    private function updateImage(Program $program, $imageField, $file)
    {
        // Delete the old image if it exists
        if ($program->$imageField) {
            Storage::delete('public/img/' . $program->$imageField);
            // dd($program->$imageField);
        }

        // Upload the new image
        $timestamp = now()->timestamp;
        $extension = $file->getClientOriginalExtension();
        $imageName = $imageField . '_' . $timestamp . '.' . $extension;
        $file->storeAs('public/img', $imageName);

        // Update the program with the new image name
        $program->$imageField = $imageName;
        $program->save();
    }

    /**
     * Delete an image for a program.
     *
     * @param  Program  $program
     * @param  string   $imageField
     * @return void
     */
    private function deleteImage(Program $program, $imageField)
    {
        if ($program->$imageField) {
            Storage::delete('public/img/' . $program->$imageField);
        }
    }
}
