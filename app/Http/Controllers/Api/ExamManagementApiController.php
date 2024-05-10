<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamManagementApiController extends Controller
{
    public function Examday(Request $request)
    {
        $examdays =  DB::table('exam_management')
            ->select('exam_management.date')
            ->get();
        $response = array(
            'data' => $examdays,
            'status' => 'success',
        );
        return response()->json($response);
    }    
}
