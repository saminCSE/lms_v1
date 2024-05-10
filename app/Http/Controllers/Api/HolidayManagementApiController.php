<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HolidayManagementApiController extends Controller
{
    public function Holiday(Request $request)
    {
        $holidays =  DB::table('holiday_management')
            ->select('holiday_management.date')
            ->get();
        $response = array(
            'data' => $holidays,
            'status' => 'success',
        );
        return response()->json($response);
    }    
}
