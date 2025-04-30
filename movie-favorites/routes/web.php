<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/movies')->name('home');
Route::redirect('/home', '/movies')->name('home.alt');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('movies.index');
    })->name('dashboard');
    
    Route::resource('movies', MovieController::class)->names([
        'index' => 'movies.index',
        'create' => 'movies.create',
        'store' => 'movies.store',
        'show' => 'movies.show',
        'edit' => 'movies.edit',
        'update' => 'movies.update',
        'destroy' => 'movies.destroy'
    ]);
    
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])
            ->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])
            ->name('profile.update');
    });
});