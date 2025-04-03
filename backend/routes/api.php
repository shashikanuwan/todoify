<?php

use App\Http\Controllers\CreateTaskController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])
    ->group(function () {
        Route::post('tasks', CreateTaskController::class)
            ->name('tasks.store');
    });
