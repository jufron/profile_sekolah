<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\MataPelajaranRequest;
use App\Http\Traits\AllertMessageTrait;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
  use AllertMessageTrait;

  public function index()
  {
    return view('dashboard.mataPelajaran.mataPelajaran', [
      'mataPelajaran'  => MataPelajaran::latest()->get()
    ]);
  }

  public function create()
  {
    return view('dashboard.mataPelajaran.add');
  }

  public function store(MataPelajaranRequest $request)
  {
    $request->mataPelajaranValidate();
    MataPelajaran::create($request->all());
    $this->ssuccesCreate();
    return to_route('mata-pelajaran.index');
  }

  public function edit(MataPelajaran $mataPelajaran)
  {
    return view('dashboard.mataPelajaran.update', [
      'mataPelajaran' => $mataPelajaran
    ]);
  }

  public function update(MataPelajaranRequest $request, MataPelajaran $mataPelajaran)
  {
    $mataPelajaran->update($request->all());
    $this->successUpdate();
    return to_route('mata-pelajaran.index');
  }

  public function destroy(MataPelajaran $mataPelajaran)
  {
    $mataPelajaran->delete();
    $this->successDelete();
    return to_route('mata-pelajaran.index');
  }
}
