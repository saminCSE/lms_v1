<?php

namespace App\Http\Controllers;

use App\Http\Requests\BatchRequest;
use App\Models\Batch;
use App\Models\Course;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data = DB::table('batches')
                ->leftJoin('courses', 'courses.id', '=', 'batches.courseId')
                ->select('batches.*', 'courses.name as course_name')
                ->get();
            return view('admin.batch.index', compact('data'));
        } catch (Exception $e) {
            // Handle the exception here, e.g., log it
            abort(404, $e->getMessage()); // Abort the request with a 404 status code and exception message
            // Uncomment the line below if you want to display the error message in the student.courses.index view.
            // return view('admin.batch.index', compact('data'));
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
        $course = ['' => 'Select Program....'] + Course::select('id', 'name')->where('is_active', 1)->get()->pluck('name', 'id')->toArray();
        return view('admin.batch.create', compact('is_active', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BatchRequest $request)
    {
        try {
            $data = $request->all();
            $user = Batch::create($data);
            // $user = '';

            if (!$user) {
                Session::flash('error', 'An error occurred');
                return redirect()->route('batch.create');
            }

            Session::flash('status', 'New Batch Created Successfully');
            return redirect()->route('batch.index');
        } catch (Exception $e) {
            // Handle other exceptions
            Session::flash('error', 'An error occurred: ' . $e->getMessage());
            return redirect()->route('batch.create'); // Redirect back to the batch index page with an error message
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
    public function edit(Batch $batch)
    {
        $is_active = CommonController::ActiveStatus();
        $course = ['' => 'Select Program....'] + Course::select('id', 'name')->where('is_active', 1)->get()->pluck('name', 'id')->toArray();
        return view('admin.batch.create')->with(['item' => $batch, 'is_active' => $is_active, 'course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BatchRequest $request, Batch $batch)
    {
        // dd('new');
        try {
            $batch->update($request->all());

            if ($request->is_default) {
                Course::where('id', '!=', $batch->id)->update(['is_default' => 0]);
            }
            if (!$batch) {
                Session::flash('error', 'An error occurred');
                return redirect()->back();
            }
            return redirect()->route('batch.index')->with('status', 'Batch Update Successfully');
        } catch (Exception $e) {
            // Handle exceptions if any occur during the update
            Session::flash('error', 'An error occurred: ' . $e->getMessage());
            return redirect()->route('batch.index'); // Redirect back to the batch index page with an error message
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        try {
            // Get the batch ID
            $batchId = $batch->id;

            // Delete related records in enrollments table
            DB::table('enrollments')
                ->where('batchId', $batchId)
                ->delete();
    
            // Delete related records in classes table
            DB::table('classes')
                ->where('batchId', $batchId)
                ->delete();
    
            // Delete related records in attendance table
            DB::table('attendance')
                ->where('batchId', $batchId)
                ->delete();
    
            // Delete the batch itself
            $batch->delete();

            return redirect()->back()->with('delete_status', 'Batch deleted successfully');
        } catch (\Exception $e) {
            // Something went wrong, so roll back the transaction
            DB::rollBack();
    
            return redirect()->back()->with('delete_status', 'Error deleting batch and related records');
        }
    }
}