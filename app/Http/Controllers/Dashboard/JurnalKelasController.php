<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\JurnalKelasRequest;
use App\Http\Traits\AllertMessageTrait;
use App\Models\{
  JurnalKelas,
  Jurusan,
  MataPelajaran
};
use DataTables;


use Illuminate\Http\Request;

class JurnalKelasController extends Controller
{
  use AllertMessageTrait;

  private $kelas_X;
  private $kelas_XI;
  private $kelas_XII;

  private function getDataJurnalArsipStatus ($kelas)
  {
    return JurnalKelas::with(['user', 'jurusan', 'mataPelajaran'])
                       ->where('kelas', $kelas)
                       ->where('arship_status', 0);
  }

  private function getDataJurnalUserAuth ($kelas)
  {
    return $this->getDataJurnalArsipStatus($kelas)
                ->whereHas('user', function ($query) {
                  $query->where('name', auth()->user()->name);
                })
                ->get();
  }

  private function checkViewWhereKelas ($kelas)
  {
    if($kelas === 'X') {
      return to_route('jurnal.kelasX');
    } else if ($kelas === 'XI') {
      return to_route('jurnal.kelasXI');
    } else if ($kelas === 'XII') {
      return to_route('jurnal.kelasXII');
    }
  }

  private function dataTables ($model, $kelas)
  {
    return DataTables::eloquent($model)
                     ->addIndexColumn()
                    //  ->with(['kelas'  => $kelas])
                    //  ->addColumn('action', 'datatables.action')
                    //  ->rowColumn(['action'])
                     ->toJson();
  }

  public function kelasX ()
  {
    dd($this->kelas_X);
    return $this->dataTables($this->kelas_X, "X");
  }

  public function index()
  {
    if (!auth()->user()->hasRole('super-admin')) {
      $this->kelas_X = $this->getDataJurnalUserAuth('X');
      $this->kelas_XI = $this->getDataJurnalUserAuth('XI');
      $this->kelas_XII = $this->getDataJurnalUserAuth('XII');
    } else {
      $this->kelas_X = $this->getDataJurnalArsipStatus('X')->get();
      $this->kelas_XI = $this->getDataJurnalArsipStatus('XI')->get();
      $this->kelas_XII = $this->getDataJurnalArsipStatus('XII')->get();
    }

    if (request()->routeIs('jurnal.kelasX')) {
      return view('dashboard.jurnalKelas.kelas', [
        'dataJurnalKelas'  => $this->kelas_X ,
        'kelas'            => 'X'
      ]);
    } else if (request()->routeIs('jurnal.kelasXI')) {
      return view('dashboard.jurnalKelas.kelas', [
        'dataJurnalKelas'   => $this->kelas_XI,
        'kelas'             => 'XI'
      ]);
    } else if (request()->routeIs('jurnal.kelasXII')) {
      return view('dashboard.jurnalKelas.kelas', [
        'dataJurnalKelas'   => $this->kelas_XII,
        'kelas'             => 'XII'
      ]);
    }
  }

  public function create($kelas)
  {
    return view('dashboard.jurnalKelas.add', [
      'mataPelajaran' => MataPelajaran::latest()->get(),
      'jurusan'       => Jurusan::latest()->get(),
      'kelas'         => $kelas
    ]);
  }

  public function store(JurnalKelasRequest $request, $kelas)
  {
    $request->createJurnallKelas();
    $this->ssuccesCreate();
    return $this->checkViewWhereKelas($kelas);
  }

  // public function show($id)
  // {
  //   return response()->json([
  //     'statusCode    '  => 200,
  //     'jurnalKelas'     => JurnalKelas::with('user', 'jurusan', 'mataPelajaran')->findOrFail($id)
  //   ]);
  // }

  public function edit(JurnalKelas $jurnalKelas, $kelas)
  {
    return view('dashboard.jurnalKelas.update', [
      'jurnalKelas'     => $jurnalKelas,
      'mataPelajaran'   => MataPelajaran::latest()->get(),
      'jurusan'         => Jurusan::latest()->get(),
      'kelas'           => $kelas
    ]);
  }

  public function update(JurnalKelasRequest $request, JurnalKelas $jurnalKelas, $kelas)
  {
    $request->updateJurnalKelas($jurnalKelas);
    $this->successUpdate();
    return $this->checkViewWhereKelas($kelas);
  }

  public function destroy(JurnalKelas $jurnalKelas, $kelas)
  {
    $jurnalKelas->delete();
    $this->successDelete();
    return $this->checkViewWhereKelas($kelas);
  }
}
