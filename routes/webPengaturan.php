<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\{
  BannerController,
  JurusanController,
  TeleponController,
  TestimoniController,
  SocialMediaLinkController,
  DaftarPertanyaanController
};

// * banner, jurusan, testimoni, telepon, social media, pertanyaan pendaftaran

// todo role admin
Route::middleware(['role:super-admin'])->group( function () {

  // todo banner
  Route::resource('banner', BannerController::class)
      ->except(['show', 'edit', 'update']);

  // todo jurusan
  Route::resource('jurusan', JurusanController::class);

  // todo testimoni
  Route::resource('testimoni', TestimoniController::class);

  // todo telepon
  Route::resource('telepon', TeleponController::class)
      ->except(['show']);

  // todo social media
  Route::resource('social_media', SocialMediaLinkController::class)
      ->except(['show'])
      ->parameters(['social_media' => 'socialMediaLink']);

  // todo pertanyaan
  Route::resource('pertanyaan', DaftarPertanyaanController::class)
      ->parameters(['pertanyaan'    => 'daftarPertanyaan']);

}); // todo end role admin
