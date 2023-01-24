<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::controller(PagesController::class)->group( function () {
  Route::get('home', 'home')->name('beranda');

  Route::prefix('profil')->group( function () {
    Route::get('/sejarah', 'sejarah')->name('sejarah');
    Route::get('visi-misi', 'visiMisi')->name('visiMisi');
    Route::get('programKeahlian', 'programKeahlian')->name('programKeahlian');
  });

  Route::get('galeri', 'galeri')->name('galeri');
  Route::get('ppdb', 'ppdb')->name('ppdb');
  Route::get('blog', 'blog')->name('blog');
  Route::get('kontak', 'kontak')->name('kontak');

  Route::get('pengajar', 'listGuru')->name('daftar_guru');
});

require __DIR__.'/auth.php';
require __DIR__.'/webDashboard.php';
