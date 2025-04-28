<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/movies');

Route::middleware(['auth'])->group(function () {
    Route::resource('movies', MovieController::class);
});

require __DIR__.'/auth.php';