<?php

use App\Http\Controllers\Api\PerformanceReviewController;
use Illuminate\Support\Facades\Route; // @phpstan-ignore-line

// ========== PERFORMANCE REVIEWS ==========
Route::prefix('performance-reviews')->group(function () {
    Route::get('/', [PerformanceReviewController::class, 'index'])
        ->middleware('role:admin_hr,manager,employee');

    Route::post('/', [PerformanceReviewController::class, 'store'])
        ->middleware('role:admin_hr,manager');

    Route::get('me', [PerformanceReviewController::class, 'me'])
        ->middleware('role:admin_hr,employee');

    Route::get('employee/{employee_id}', [PerformanceReviewController::class, 'showByEmployee'])
        ->middleware('role:admin_hr,manager,employee');

    Route::get('{id}', [PerformanceReviewController::class, 'show'])
        ->middleware('role:admin_hr,manager,employee');

    Route::put('{id}', [PerformanceReviewController::class, 'update'])
        ->middleware('role:admin_hr,manager');

    Route::delete('{id}', [PerformanceReviewController::class, 'destroy'])
        ->middleware('role:admin_hr,manager');
});
