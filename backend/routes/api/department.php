<?php

use App\Http\Controllers\Api\DepartmentController;
use Illuminate\Support\Facades\Route; // @phpstan-ignore-line

// ========== DEPARTMENTS ==========
Route::middleware('role:admin_hr')->prefix('departments')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::post('/', [DepartmentController::class, 'store']);
    Route::get('{id}', [DepartmentController::class, 'show']);
    Route::put('{id}', [DepartmentController::class, 'update']);
    Route::delete('{id}', [DepartmentController::class, 'destroy']);
});
