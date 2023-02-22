<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\{
  BeritaController,
  KategoryController,
  MataPelajaranController,
  UserController
};
use App\Http\Controllers\Dashboard\JurnalKelas\JurnalKelasGuruController;

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group( function () {

  Route::get('/', fn () => view('dashboard.index'))->name('dashboard');

  // Route::get('role', function () {
  //   $user = auth()->user();
  //   $user->assignRole('guru');
  // });

  // todo role admin
  Route::middleware(['role:super-admin'])->group( function () {

    // todo user seting
    Route::controller(ProfileController::class)->group( function () {
      Route::get('/profile', 'edit')->name('profile.edit');
      Route::patch('/profile', 'update')->name('profile.update');
      Route::delete('/profile', 'destroy')->name('profile.destroy');
    }); // todo end user manajement

    // todo guru
    // Route::resource()

    // todo user
    Route::resource('user_manajement', UserController::class)
          ->except(['create', 'store'])
          ->parameters(['user_manajement'  => 'user']);

    // todo mata pelajaran
    Route::resource('mata-pelajaran', MataPelajaranController::class)
        ->except(['show'])
        ->parameters(['mata_pelajaran'  => 'mataPelajaran']);

  }); // todo role super-admin

  // todo role super-admin, guru
  Route::middleware(['role:guru|super-admin'])->group( function () {

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
    Route::controller(JurnalKelasGuruController::class)->group( function () {
      Route::get('jurnal/getkelas', 'getKelas')->name('jurnal.getdata');
      Route::post('jurnal/arship', 'setArship')->name('jurnal.arship');
    });

    Route::resource('jurnal', JurnalKelasGuruController::class)
           ->parameters(['jurnal' => 'jurnalKelas']);

  }); // todo end role super-admin, guru

  // * fitur pengaturan

  Route::get('pengaturan', fn () => view('dashboard.pengaturan.pengaturan'))->name('pengaturan');

  require __DIR__.'/webPengaturan.php';

}); // auth
