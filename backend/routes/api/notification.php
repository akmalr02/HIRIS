<?php

use App\Http\Controllers\Api\NotificationController;
use Illuminate\Support\Facades\Route; // @phpstan-ignore-line

// ========== NOTIFICATIONS ==========
Route::prefix('notifications')->group(function () {
    Route::get('me', [NotificationController::class, 'me'])
        ->middleware('role:admin_hr,manager,employee');

    Route::get('unread', [NotificationController::class, 'unread'])
        ->middleware('role:admin_hr,manager,employee');

    Route::put('read-all', [NotificationController::class, 'markAllAsRead'])
        ->middleware('role:admin_hr,manager,employee');

    Route::get('/', [NotificationController::class, 'index'])
        ->middleware('role:admin_hr,manager,employee');

    Route::post('/', [NotificationController::class, 'store'])
        ->middleware('role:admin_hr');

    Route::post('broadcast', [NotificationController::class, 'broadcast'])
        ->middleware('role:admin_hr');

    Route::get('{id}', [NotificationController::class, 'show'])
        ->middleware('role:admin_hr,manager,employee');

    Route::put('{id}/read', [NotificationController::class, 'markAsRead'])
        ->middleware('role:admin_hr,manager,employee');

    Route::delete('{id}', [NotificationController::class, 'destroy'])
        ->middleware('role:admin_hr,manager,employee');
});
