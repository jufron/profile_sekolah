<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\{
  BannerController,
  BeritaController,
  JurusanController,
  KategoryController,
  SocialMediaLinkController,
  TeleponController,
  TestimoniController
};

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group( function () {

  // Route::get('/', function () {
  //   return view('dashboard');
  // })->name('dashboard');

  Route::get('/', fn () => view('dashboard.index'))->name('dashboard');

  // user manajement
  Route::controller(ProfileController::class)->group( function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
  });

  // berita manajement
  Route::prefix('berita')->controller(BeritaController::class)->group( function () {
    Route::get('/', 'index')->name('berita');

    // kategory manajement
    Route::prefix('kategory')->controller(KategoryController::class)->group( function () {
      Route::get('/', 'index')->name('kategory');
      Route::post('/', 'store')->name('kategory.store');
      Route::get('/data-kategory', 'data')->name('kategory.data');
      Route::delete('/{id}', 'destroy')->name('kategory.destroy');
    });
  });


  // pengaturan website
  Route::get('pengaturan', fn () => view('dashboard.pengaturan.pengaturan'))->name('pengaturan');

  // telepon
  Route::resource('telepon', TeleponController::class)->except([
    'show'
  ]);
  // social media
  Route::resource('social_media', SocialMediaLinkController::class)->except([
    'show'
  ])->parameters([
    'social_media' => 'socialMediaLink'
  ]);
  // banner depan
  Route::resource('banner', BannerController::class)->except([
    'show', 'edit', 'update'
  ]);
  // jurusan
  Route::resource('jurusan', JurusanController::class)->except([
    'show'
  ]);
  Route::get('show_data/{jurusan}', [JurusanController::class, 'showJurusan'])->name('jurusan.show');

  // testimoni
  Route::resource('testimoni', TestimoniController::class);
}); // auth

