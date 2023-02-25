<?php

namespace App\Http\Controllers\Dashboard\Guru;

use App\Models\{
  Guru,
  Jurusan,
  MataPelajaran
};

use Illuminate\Http\Request;
use App\Http\{
  Controllers\Controller,
  Requests\GuruRequest
};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dataGuru = 'false';
      $oneGuru = Guru::with('user', 'jurusan', 'mataPelajaran')
                     ->where('user_id', auth()->user()->id)
                     ->get()
                     ->first();

      if ($oneGuru) {
        $dataGuru = 'true';
      }

      return view('dashboard.guru.profil.show', [
        'user'      => auth()->user(),
        'oneGuru'   => $oneGuru,
        'state'     => $dataGuru,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (Guru::where('user_id', auth()->user()->id)->get()->first()) {
        // jika data ada
        return abort(403);
      }
      return view('dashboard.guru.profil.add', [
        'mataPelajaran'   => MataPelajaran::select('nama', 'id')->latest()->get(),
        'jurusan'         => Jurusan::select('nama', 'id')->latest()->get()
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuruRequest $request)
    {
      $request->validateCheckUnique();
      if ($request->file('avatar')) {
        $fileName = $request->file('avatar')->store('guru', 'public');
        $request->createGuru($fileName);
        return to_route('guru.index');
      } else {
        $request->createGuru();
        return to_route('guru.index');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
      if (!Guru::where('user_id', auth()->user()->id)->get()->first()) {
        // jika data tidak ada
        return abort(403);
      }

      $key = auth()->user()->id;

      $guruModelCache = Cache::remember($key, 60, function () use ($guru) {
          return $guru->load('mataPelajaran', 'jurusan', 'user');
      });

      return view('dashboard.guru.profil.update', [
        'guru'            => $guruModelCache,
        'mataPelajaran'   => MataPelajaran::select('id', 'nama')->get(),
        'jurusan'         => Jurusan::select('id', 'nama')->get()
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(GuruRequest $request, Guru $guru)
    {
      if ($request->file('avatar')) {

        // jika nama file gambar ada di database maka hapus dulu baru simpan yang baru
        if ($guru->avatar) {
          Storage::delete("public/$guru->avatar");
        }

        $fileName = $request->file('avatar')->store('guru', 'public');
        $request->updateGuru($guru, $fileName);

        return to_route('guru.index');

      } else {
        $request->updateGuru($guru, $guru->avatar);
        return to_route('guru.index');
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        //
    }

}
