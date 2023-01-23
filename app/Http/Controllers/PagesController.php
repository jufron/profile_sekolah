<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function home ()
  {
    return view('pages.beranda');
  }

  public function sejarah ()
  {
    return view('pages.sejarah');
  }

  public function visiMisi ()
  {
    return view('pages.visi-misi');
  }

  public function programKeahlian ()
  {
    return view('pages.programKeahlian');
  }

  public function galeri ()
  {
    return view('pages.galeri');
  }

  public function ppdb ()
  {
    return view('pages.ppdb');
  }

  public function blog ()
  {
    return view('pages.blog');
  }

  public function kontak ()
  {
    return view('pages.kontak');
  }

  public function listGuru ()
  {
    return view('pages.daftarGuru');
  }
}
