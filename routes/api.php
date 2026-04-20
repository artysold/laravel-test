<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:api'])->group(function () {
    Route::prefix('v1.0.0')
        ->name('api.v1.0.0/')
        ->group(base_path('routes/api/v1_0_0.php'));
});
