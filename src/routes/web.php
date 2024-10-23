<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BreakTimeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function() {
    //打刻ページ
    Route::get('/', [AttendanceController::class, 'create']);
    //日付一覧
    Route::get('/attendance', [AttendanceController::class, 'index']);
    Route::post('/attendance/start', [AttendanceController::class, 'store']);
    Route::post('/attendance/end', [AttendanceController::class, 'update']);

    Route::post('/break/start', [BreakTimeController::class, 'store']);
    //Route::post('/break/end', [BreakTimeController::class, 'update']);
});
