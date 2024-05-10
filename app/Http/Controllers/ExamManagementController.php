<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CommonController;
use App\Models\Batch;
use App\Rules\UniqueDateForExams;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExamManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $data = DB::table('exam_management as hm')
                ->select('hm.*')
                ->orderByDesc('hm.id')
                ->get();
            return view('admin.examManagement.index', compact('data'));
        } catch (Exception $e) {
            // Handle the exception here, e.g., log it
            abort(404, $e->getMessage()); // Abort the request with a 404 status code and exception message
            // Uncomment the line below if you want to display the error message in the admin.examManagement.index view.
            // return view('admin.examManagement.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $weekendsFromDatabase = DB::table('exam_management')->pluck('date');
        $batch = ['' => 'Select Batch....'] + Batch::select('id', 'batchName')->where('is_active', 1)->get()->pluck('batchName', 'id')->toArray();
        $exam_names = CommonController::ExamType();
        return view('admin.examManagement.create', compact('exam_names', 'weekendsFromDatabase', 'batch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $validator = Validator::make($request->all(), [
                'date' => ['required', 'date_format:Y-m-d', new UniqueDateForExams($request->input('exam_name'))],
                'exam_name' => 'required',
                'batchId' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                $dateErrorMessage = $errors->first('date');
                return response()->json(['errors' => ['date' => $dateErrorMessage]], 422);
            }

            $date = $request->input('date');
            $exam_name = $request->input('exam_name');
            $notes = $request->input('notes');
            $batchId = $request->input('batchId');

            DB::table('exam_management')->insert([
                'date' => $date,
                'exam_name' => $exam_name,
                'notes' => $notes,
                'batchId' => $batchId,
            ]);

            return response()->json(['message' => 'Exam added successfully']);
        } catch (Exception $e) {
            // Handle other exceptions
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
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
        $exam = DB::table('exam_management')->find($id);
        if ($exam) {
            DB::table('exam_management')
                ->where('id', $id)
                ->delete();
            return redirect()
                ->back()
                ->with('status', 'Exam Delete Successfully');
        } else {
            return redirect()
                ->back()
                ->with('status', 'Exam not found');
        }
    }
}