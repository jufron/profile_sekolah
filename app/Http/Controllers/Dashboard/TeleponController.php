<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeleponRequest;
use App\Models\Telepon;

class TeleponController extends Controller
{
    public function index()
    {
      return view('dashboard.telepon.telepon', [
        'telepon' => Telepon::latest()->get()
      ]);
    }

    public function create()
    {
      return view('dashboard.telepon.add');
    }

    public function store(TeleponRequest $request)
    {
      $request->validate(['nomor' => 'unique:telepon']);
      Telepon::create($request->all());
      alert()->success('Berhasil','Berhasil tersimpan');
      return to_route('telepon.index');
    }

    public function edit(Telepon $telepon)
    {
      return view('dashboard.telepon.update', compact('telepon'));
    }

    public function update(TeleponRequest $request, Telepon $telepon)
    {
      $telepon->update($request->all());
      alert()->success('Berhasil','Berhasil Diperbaharui');
      return to_route('telepon.index');
    }

    public function destroy(Telepon $telepon)
    {
      $telepon->delete();
      alert()->success('Berhasil','Berhasil Terhapus');
      return to_route('telepon.index');
    }
}
