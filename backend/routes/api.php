<?php

use App\Http\Controllers\CompleteTaskController;
use App\Http\Controllers\CreateTaskController;
use App\Http\Controllers\FetchTaskController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])
    ->group(function () {
        Route::get('tasks', FetchTaskController::class)
            ->name('tasks.index');

        Route::post('tasks', CreateTaskController::class)
            ->name('tasks.store');

        Route::patch('tasks/{task}/complete', CompleteTaskController::class)
            ->name('tasks.complete');
    });
