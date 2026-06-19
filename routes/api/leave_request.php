<?php

use App\Http\Controllers\Api\LeaveRequestController;
use Illuminate\Support\Facades\Route; // @phpstan-ignore-line

// ========== LEAVE REQUESTS ==========
Route::prefix('leave-requests')->group(function () {
    Route::post('/', [LeaveRequestController::class, 'store'])
        ->middleware('role:employee,admin_hr');

    Route::get('me', [LeaveRequestController::class, 'me'])
        ->middleware('role:employee,admin_hr');

    Route::get('/', [LeaveRequestController::class, 'index'])
        ->middleware('role:admin_hr,manager');

    Route::put('{id}', [LeaveRequestController::class, 'update'])
        ->middleware('role:employee,admin_hr');

    Route::delete('{id}', [LeaveRequestController::class, 'destroy'])
        ->middleware('role:employee,admin_hr');

    Route::patch('{id}/review', [LeaveRequestController::class, 'review'])
        ->middleware('role:admin_hr,manager');
});
