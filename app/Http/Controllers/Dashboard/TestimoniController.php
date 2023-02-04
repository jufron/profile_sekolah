<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Testimoni;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestimoniRequest;
use Illuminate\Support\Facades\Storage;

class TestimoniController extends Controller
{
  public function index()
  {
    return view('dashboard.testimoni.testimoni', [
      'testimoni'   => Testimoni::latest()->get()
    ]);
  }

  public function create()
  {
    return view('dashboard.testimoni.add');
  }

  public function store(TestimoniRequest $request)
  {
    $request->validateTestimoni();
    $namaFile = $request->file('avatar')->store('testimoni', 'public');
    $request->createTestimoni($namaFile);
    alert()->success('Berhasil','Berhasil tersimpan');
    return to_route('testimoni.index');
  }

  public function edit(Testimoni $testimoni)
  {
    return view('dashboard.testimoni.update', compact('testimoni'));
  }

  public function update(TestimoniRequest $request, Testimoni $testimoni)
  {
    if ($request->file('avatar')) {
      Storage::delete("public/$testimoni->avatar");
      $fileName = $request->file('avatar')->store('testimoni', 'public');
    } else {
      $fileName = $testimoni->avatar;
    }
    $request->updateTestimoni($fileName, $testimoni);
    alert()->success('Berhasil','Berhasil Diperbaharui');
    return to_route('testimoni.index');
  }

  public function show (Testimoni $testimoni) 
  {
    return response()->json([
      'statusCode'  => 200,
      'testimoni'     => $testimoni
    ]);
  }

  public function destroy(Testimoni $testimoni)
  {
    Storage::delete("public/{$testimoni->avatar}");
    $testimoni->delete();
    alert()->success('Berhasil','Berhasil Terhapus');
    return to_route('testimoni.index');
  }
}
