<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Media\Http\Controllers\MediaController;

Route::middleware('auth:sanctum')->group(function() {
    Route::post('media', [MediaController::class, 'upload']);
});
