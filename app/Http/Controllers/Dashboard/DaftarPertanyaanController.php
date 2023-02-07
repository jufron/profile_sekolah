<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DaftarPertanyaanRequest;
use App\Http\Traits\AllertMessageTrait;
use App\Models\DaftarPertanyaan;
use Illuminate\Http\Request;

class DaftarPertanyaanController extends Controller
{
  use AllertMessageTrait;

  public function index()
  {
    return view('dashboard.pertanyaan.pertanyaan', [
      'daftarPertanyaan'  => DaftarPertanyaan::latest()->get()
    ]);
  }

  public function create()
  {
    return view('dashboard.pertanyaan.add');
  }

  public function store(DaftarPertanyaanRequest $request)
  {
    DaftarPertanyaan::create($request->all());
    $this->ssuccesCreate();
    return to_route('pertanyaan.index');
  }

  public function show(DaftarPertanyaan $daftarPertanyaan)
  {
    return response()->json([
      'status'            => 200,
      'daftarPertanyaan'  => $daftarPertanyaan
    ]);
  }

  public function edit(DaftarPertanyaan $daftarPertanyaan)
  {
    return view('dashboard.pertanyaan.update', compact('daftarPertanyaan'));
  }
  
  public function update(DaftarPertanyaanRequest $request, DaftarPertanyaan $daftarPertanyaan)
  {
    $daftarPertanyaan->update($request->all());
    $this->successUpdate();
    return to_route('pertanyaan.index');
  }

  public function destroy(DaftarPertanyaan $daftarPertanyaan)
  {
    $daftarPertanyaan->delete();
    $this->successUpdate();
    return to_route('pertanyaan.index');
  }
}
