<?php

use App\Http\Controllers\Api\ExamManagementApiController;
use App\Http\Controllers\Api\HolidayManagementApiController;
use App\Http\Controllers\ExamManagementController;
use App\Http\Controllers\StudentAttendanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('v1')->group(function () {
    Route::get('/getExamdays',[ExamManagementApiController::class,'Examday']);
    Route::post('/student_attendance',[StudentAttendanceController::class,'StudentAttendance']);
});

