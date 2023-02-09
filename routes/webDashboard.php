<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\{
  BeritaController,
  KategoryController,
  MataPelajaranController,
  UserController
};

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group( function () {

  Route::get('/', fn () => view('dashboard.index'))->name('dashboard');

  Route::get('role', function () {
    $user = auth()->user();
    $user->assignRole('wali-kelas');
  });

  // todo role admin
  Route::middleware(['role:super-admin'])->group( function () {

    // todo user manajement
    Route::controller(ProfileController::class)->group( function () {
      Route::get('/profile', 'edit')->name('profile.edit');
      Route::patch('/profile', 'update')->name('profile.update');
      Route::delete('/profile', 'destroy')->name('profile.destroy');
    }); // todo end user manajement

    // todo guru
    // Route::resource()

    // todo role admin guru wali kelas
    Route::middleware(['role:guru|wali-kelas'])->group( function () {

      // todo berita
      Route::prefix('berita')->controller(BeritaController::class)->group( function () {
        Route::get('/', 'index')->name('berita');

        // todo kategory
        Route::prefix('kategory')->controller(KategoryController::class)->group( function () {
          Route::get('/', 'index')->name('kategory');
          Route::post('/', 'store')->name('kategory.store');
          Route::get('/data-kategory', 'data')->name('kategory.data');
          Route::delete('/{id}', 'destroy')->name('kategory.destroy');
        }); // todo end kategory

      }); // todo end berita

      // todo jurnal kelas
      // Route::resource()

    }); // todo end role guru, wali kelas

    // todo role wali kelas
    Route::middleware(['role:wali-kelas'])->group( function () {
      // Route::
    }); // todo end role wali kelas

    // todo user
    Route::resource('user-manajement', UserController::class)
        ->except(['create', 'store'])
        ->parameters(['user_manajement'  => 'user']);

    // todo mata pelajaran
    Route::resource('mata-pelajaran', MataPelajaranController::class)
        ->except(['show'])
        ->parameters(['mata_pelajaran'  => 'mataPelajaran']);

  }); // todo role admin

  // * fitur pengaturan

  Route::get('pengaturan', fn () => view('dashboard.pengaturan.pengaturan'))->name('pengaturan');

  require __DIR__.'/webPengaturan.php';

}); // auth
