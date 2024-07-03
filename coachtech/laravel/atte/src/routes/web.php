<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::get('/', [AttendanceController::class, 'index']);
});

Route::get('/attendance', [AttendanceController::class, 'admin']);
Route::get('/attendance/start', [AttendanceController::class, 'startWork']);
Route::get('/attendance/end', [AttendanceController::class, 'endWork']);
Route::get('/rest/start', [AttendanceController::class, 'startRest']);
Route::get('/rest/end', [AttendanceController::class, 'endRest']);
Route::get('/attendance/date', [AttendanceController::class, 'attendanceDate']);