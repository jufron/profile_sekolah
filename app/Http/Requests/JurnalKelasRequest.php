<?php

namespace App\Http\Requests;

use App\Models\JurnalKelas;
use Illuminate\Foundation\Http\FormRequest;

class JurnalKelasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
      return [
      'tanggal'           => ['required'],
      'mata_pelajaran_id' => ['required'],
      'kelas'             => ['required'],
      'jurusan_id'        => ['required'],
      'jam_ke'            => ['required', 'max:4'],
      'materi_pokok'      => ['required', 'max:5000'],
      'sakit'             => ['required', 'numeric', 'digits_between:1,2'],
      'ijin'              => ['required', 'numeric', 'digits_between:1,2'],
      'alpha'             => ['required', 'numeric', 'digits_between:1,2'],
      ];
    }

    public function createJurnallKelas ()
    {
      JurnalKelas::create([
        'user_id'           => auth()->user()->id,
        'tanggal'           => $this->tanggal,
        'mata_pelajaran_id' => $this->mata_pelajaran_id,
        'kelas'             => $this->kelas,
        'jurusan_id'        => $this->jurusan_id,
        'jam_ke'            => $this->jam_ke,
        'materi_pokok'      => $this->materi_pokok,
        'sakit'             => $this->sakit,
        'ijin'              => $this->ijin,
        'alpha'             => $this->alpha,
        'arship_status'     => false
      ]);
    }

    public function updateJurnalKelas ($jurnalKelas)
    {
      $jurnalKelas->update([
        'user_id'           => auth()->user()->id,
        'tanggal'           => $this->tanggal,
        'mata_pelajaran_id' => $this->mata_pelajaran_id,
        'kelas'             => $this->kelas,
        'jurusan_id'        => $this->jurusan_id,
        'jam_ke'            => $this->jam_ke,
        'materi_pokok'      => $this->materi_pokok,
        'sakit'             => $this->sakit,
        'ijin'              => $this->ijin,
        'alpha'             => $this->alpha,
        'arship_status'     => false
      ]);
    }
}
