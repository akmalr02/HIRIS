<?php

use App\Http\Controllers\Api\SalarySlipController;
use App\Http\Controllers\Api\SalaryGenerationController;
use Illuminate\Support\Facades\Route; // @phpstan-ignore-line

// ========== SALARY GENERATION ==========
Route::prefix('salary-slips/generate')->middleware('role:admin_hr')->group(function () {
    Route::post('single', [SalaryGenerationController::class, 'generateSingle']);
    Route::post('bulk', [SalaryGenerationController::class, 'generateBulk']);
    Route::post('preview', [SalaryGenerationController::class, 'previewCalculation']);
});

// ========== SALARY SLIPS ==========
Route::prefix('salary-slips')->group(function () {
    Route::get('me', [SalarySlipController::class, 'me'])
        ->middleware('role:employee,admin_hr,manager');

    Route::get('/', [SalarySlipController::class, 'index'])
        ->middleware('role:admin_hr');

    Route::post('/', [SalarySlipController::class, 'store'])
        ->middleware('role:admin_hr');

    Route::get('{id}', [SalarySlipController::class, 'show'])
        ->middleware('role:admin_hr,manager,employee');

    Route::put('{id}', [SalarySlipController::class, 'update'])
        ->middleware('role:admin_hr');

    Route::delete('{id}', [SalarySlipController::class, 'destroy'])
        ->middleware('role:admin_hr');
});
