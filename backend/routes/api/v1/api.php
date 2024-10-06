<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('dadata')->group(function () {
        Route::get('address', [\App\Http\Controllers\DadataController::class, 'address']);
    });
});
