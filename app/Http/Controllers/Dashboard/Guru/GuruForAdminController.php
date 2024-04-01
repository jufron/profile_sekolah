<?php

namespace App\Http\Controllers\Dashboard\Guru;

use App\Http\Controllers\Controller;
use App\Http\Traits\AllertMessageTrait;
use App\Models\Guru;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class GuruForAdminController extends Controller
{
  use AllertMessageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $allGuru = Guru::with('jurusan', 'mataPelajaran')
                  ->with('user', function ($query) {
                    $query->select(['id', 'email']);
                  })
                  ->select([
                      'id',
                      'avatar',
                      'user_id',
                      'nama_lengkap',
                      'gelar_depan',
                      'gelar_belakang',
                      'nip',
                      'suku',
                      'agama',
                      'jenis_kelamin',
                      'created_at',
                      'updated_at'
                    ])
                    ->latest()
                    ->get();
      return view('dashboard.guru.guru', compact('allGuru'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
      return response()->json([
        'status'  => 200,
        'guru'    => $guru->load('mataPelajaran', 'jurusan', 'user')
      ]);
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

  public function laporan ()
  {
    $allGuru = Guru::with('user')
                    ->with('jurusan', fn ($query) => $query->select('nama'))
                    ->with('mataPelajaran', fn ($query) =>  $query->select('nama'))
                    ->select([
                      'id',
                      'avatar',
                      'user_id',
                      'nama_lengkap',
                      'gelar_depan',
                      'gelar_belakang',
                      'nip',
                      'suku',
                      'alamat',
                      'agama',
                      'jenis_kelamin',
                      'nomor_telepon'
                    ])
                    ->latest()
                    ->get();

    $laporanGuruPDF = PDF::loadView('dashboard.guru.laporan', [
      'allGuru' => $allGuru
    ])->setPaper('a4', 'landscape');
    return $laporanGuruPDF->download('laporan_daftar_guru.pdf');
    // return view('dashboard.guru.laporan', compact('allGuru'));
  }
}
