<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kategory;
use Illuminate\Http\Request;

class KategoryController extends Controller
{
  public function index ()
  {
    return view('dashboard.kategory.index', [
      'kategorys' => Kategory::latest()->get()
    ]);
  }

  public function data ()
  {
    return response()->json([
      'status'          => 'success',
      'responseStatus'  => 200,
      'data'            => Kategory::latest()->get()
    ]);
  }

  public function store (Request $request)
  {
    $request->validate([
      'nama'  => ['required', 'min:3', 'unique:kategory']
    ]);

    Kategory::create([
      'nama'  => $request->nama
    ]);

    return response()->json([
      'message' => 'data berhasil tersimpan'
    ]);
  }

  public function destroy ($id)
  {
    Kategory::destroy($id);
    return response()->json([
      'id'              => $id,
      'status'          => 'success',
      'responseStatus'  => 200,
      'message'         => 'data berhasil dihapus'
    ]);
  }
}
