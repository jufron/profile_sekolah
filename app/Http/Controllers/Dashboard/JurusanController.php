<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\JurusanRequest;
use Illuminate\Support\Facades\Storage;

class JurusanController extends Controller
{
  public function index()
  {
    return view('dashboard.jurusan.jurusan', [
      'jurusan' => Jurusan::latest()->get()
    ]);
  }

  public function create()
  {
    return view('dashboard.jurusan.add');
  }

  public function store(JurusanRequest $request)
  {
    $request->validateCheck();
    $namaFile = $request->file('poster')->store('poster', 'public');
    $request->createJurusan($namaFile);
    alert()->success('Berhasil','Berhasil tersimpan');
    return to_route('jurusan.index');
  }

  public function edit(Jurusan $jurusan)
  {
    return view('dashboard.jurusan.update', [
      'jurusan'   => $jurusan
    ]);
  }

  public function update(JurusanRequest $request, Jurusan $jurusan)
  {
    if ($request->file('poster')) {
      Storage::delete("public/$jurusan->poster");
      $fileName = $request->file('poster')->store('poster', 'public');
    } else {
      $fileName = $jurusan->poster;
    }
    $request->updateJurusan($fileName, $jurusan);
    alert()->success('Berhasil','Berhasil Diperbaharui');
    return to_route('jurusan.index');
  }

  public function destroy(Jurusan $jurusan)
  {
    Storage::delete("public/{$jurusan->poster}");
    $jurusan->delete();
    alert()->success('Berhasil','Berhasil Terhapus');
    return to_route('jurusan.index');
  }

  public function showJurusan (Jurusan $jurusan)
  {
    return response()->json([
      'statusCode'  => 200,
      'jurusan'     => $jurusan
    ]);
  }
}
