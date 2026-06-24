<?php

use App\Http\Controllers\Api\AttendanceController;
use Illuminate\Support\Facades\Route; // @phpstan-ignore-line

// ========== ATTENDANCES ==========
Route::prefix('attendances')->group(function () {
    Route::post('check-in', [AttendanceController::class, 'checkIn'])
        ->middleware('role:employee,admin_hr');

    Route::post('check-out', [AttendanceController::class, 'checkOut'])
        ->middleware('role:employee,admin_hr');

    Route::get('me', [AttendanceController::class, 'me'])
        ->middleware('role:employee,admin_hr');

    Route::get('/', [AttendanceController::class, 'index'])
        ->middleware('role:admin_hr,manager');
});
