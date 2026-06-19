<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Auth Routes
Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware('auth:api')->group(function () {
        Route::get('me', [AuthController::class, 'me']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

// Protected Routes
Route::middleware(['auth:api'])->group(function () {
    require __DIR__ . '/api/profile.php';
    require __DIR__ . '/api/dashboard.php';
    require __DIR__ . '/api/department.php';
    require __DIR__ . '/api/employee.php';
    // require __DIR__ . '/api/attendance.php';
    require __DIR__ . '/api/leave_request.php';
    // require __DIR__ . '/api/performance_review.php';
    // require __DIR__ . '/api/salary.php';
    require __DIR__ . '/api/notification.php';
});
