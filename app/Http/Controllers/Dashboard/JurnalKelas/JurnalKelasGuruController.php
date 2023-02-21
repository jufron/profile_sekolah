<?php

namespace App\Http\Controllers\Dashboard\JurnalKelas;

use Illuminate\Http\Request;
use App\Http\{
  Controllers\Controller,
  Requests\JurnalKelasRequest,
  Traits\AllertMessageTrait
};
use App\Models\{
  Jurusan,
  JurnalKelas,
  MataPelajaran
};
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class JurnalKelasGuruController extends Controller
{
  use AllertMessageTrait;

  private function datatable ($model, $request)
  {
    return Datatables::eloquent($model)
                    ->addIndexColumn()
                    ->addColumn('action', 'datatables.action')
                    ->filter( function ($query) use ($request) {
                      if ($request->get('kelas')) {
                        $query->where('kelas', $request->get('kelas'));
                      }
                      if ($request->get('jurusan')) {
                        $query->where('jurusan_id', $request->get('jurusan'));
                      }
                      if ($request->get('mataPelajaran')) {
                        $query->where('mata_pelajaran_id', $request->get('mataPelajaran'));
                      }
                    })
                    ->rawColumns(['action'])
                    ->toJson();
  }

  public function getKelas (Request $request)
  {
    $dataFromAdmin = JurnalKelas::with(['user' => function ($query) {
                                  $query->select('id', 'name');
                                }])
                                ->with(['jurusan' => function ($query) {
                                  $query->select('id', 'nama');
                                }])
                                ->with(['mataPelajaran' => function ($query) {
                                    $query->select('id', 'nama');
                                }])
                                ->where('arship_status', 0)
                                ->latest();

    $dataForGuru =
      JurnalKelas::with(['user' => function ($query) {
                          $query->select('id', 'name');
                        }])
                        ->with(['jurusan' => function ($query) {
                          $query->select('id', 'nama');
                        }])
                        ->with(['mataPelajaran' => function ($query) {
                            $query->select('id', 'nama');
                        }])
                        ->where('user_id', auth()->user()->id)
                        ->where('arship_status', 0)
                        ->latest();

    if(auth()->user()->hasRole('super-admin')) {
      return $this->datatable($dataFromAdmin, $request);
    }else {
      return $this->datatable($dataForGuru, $request);
    }
  }

  public function index()
  {
    $now = Carbon::now();
    $currentYear = $now->year;
    $currentMounth = $now->month;

    $currentMounth >= 1 && $currentMounth <= 6
        ? $currentSemester = 1
        : $currentSemester = 2;

    if ($currentSemester == 1) {
      $nowSemester = 'Semester Ganjil';
    } else {
      $nowSemester = 'Semester Henap';
    }

    return view('dashboard.jurnalKelas.kelas', [
    'semesterSekarang'    => $nowSemester,
    'jurusan'             => Jurusan::select('id', 'nama')->get(),
      'mataPelajaran'     => MataPelajaran::select('id', 'nama')->get()
    ]);
  }

  public function create()
  {
    return view('dashboard.jurnalKelas.add', [
      'mataPelajaran' => MataPelajaran::select('id', 'nama')
                                      ->latest()
                                      ->get(),
      'jurusan'       => Jurusan::select('id', 'nama')
                                ->latest()
                                ->get()
    ]);
  }

  public function store(JurnalKelasRequest $request)
  {
    $this->ssuccesCreate();
    $request->createJurnallKelas();
    return to_route('jurnal.index');
  }

  public function show($id)
  {
    return response()->json([
      'statusCode    '  => 200,
      'jurnalKelas'     => JurnalKelas::with('user', 'jurusan', 'mataPelajaran')->findOrFail($id)
    ]);
  }

  public function edit(JurnalKelas $jurnalKelas)
  {
    return view('dashboard.jurnalKelas.update', [
      'jurnalKelas'     => $jurnalKelas,
      'mataPelajaran'   => MataPelajaran::select('id', 'nama')
                                        ->latest()
                                        ->get(),
      'jurusan'         => Jurusan::select('id', 'nama')
                                  ->latest()
                                  ->get(),
    ]);
  }

  public function update(JurnalKelasRequest $request, JurnalKelas $jurnalKelas)
  {
    $request->updateJurnalKelas($jurnalKelas);
    $this->successUpdate();
    return to_route('jurnal.index');
  }

  public function destroy(JurnalKelas $jurnalKelas)
  {
    $jurnalKelas->delete();
    $this->successDelete();
    return to_route('jurnal.index');
  }

  public function setArship ()
  {
    JurnalKelas::where('arship_status', 1)->update(['arship_status' => 0]);
    $this->successArship();
    return to_route('jurnal.index');
  }
}
