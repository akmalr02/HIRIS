<?php

use App\Http\Controllers\Api\DashboardEmployeeController;
use App\Http\Controllers\Api\DashboardAdminController;
use App\Http\Controllers\Api\DashboardManagerController;
use Illuminate\Support\Facades\Route; // @phpstan-ignore-line

// ========== DASHBOARD ==========
Route::prefix('dashboard')->group(function () {
    Route::get('employee', [DashboardEmployeeController::class, 'index'])
        ->middleware('role:admin_hr,employee');

    Route::get('admin', [DashboardAdminController::class, 'index'])
        ->middleware('role:admin_hr');

    Route::get('manager', [DashboardManagerController::class, 'index'])
        ->middleware('role:manager');
});
