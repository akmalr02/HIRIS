<?php

use App\Http\Controllers\Api\ProfileController;
use Illuminate\Support\Facades\Route; // @phpstan-ignore-line

// ========== PROFILE ==========
Route::get('me/profile', [ProfileController::class, 'show'])
    ->middleware('role:admin_hr,manager,employee');
