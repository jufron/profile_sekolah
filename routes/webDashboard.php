<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;



// Route::get('/test', function () {
//   return view('dashboard.index');
// });

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group( function () {
  Route::get('/', function () {
    return view('dashboard');
  })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
