<?php

use App\Http\Controllers\Api\EmployeeController;
use Illuminate\Support\Facades\Route; // @phpstan-ignore-line

// ========== EMPLOYEES ==========
Route::prefix('employees')->group(function () {
    Route::get('managers', [EmployeeController::class, 'getManagers'])
        ->middleware('role:admin_hr,manager');

    Route::get('/', [EmployeeController::class, 'index'])
        ->middleware('role:admin_hr,manager');

    Route::post('/', [EmployeeController::class, 'store'])
        ->middleware('role:admin_hr');

    Route::get('{id}', [EmployeeController::class, 'show'])
        ->middleware('role:admin_hr,manager,employee');

    Route::put('{id}', [EmployeeController::class, 'update'])
        ->middleware('role:admin_hr');

    Route::delete('{id}', [EmployeeController::class, 'destroy'])
        ->middleware('role:admin_hr');
});
