<?php

namespace App\Http\Requests;

use App\Http\Traits\AllertMessageTrait;
use App\Models\Guru;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class GuruRequest extends FormRequest
{
  use AllertMessageTrait;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return auth()->user()->hasRole('guru') ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
      return [
        'nama_lengkap'   => ['required', 'min:5', 'max:100'],
        'gelar_depan'    => ['min:2', 'max:15', 'nullable'],
        'gelar_belakang' => ['required', 'min:2', 'max:20'],
        'status'         => ['required', 'min:3', 'max:20'],
        'nip'            => ['numeric', 'digits_between:4,14', 'nullable'], //unique
        'jenis_kelamin'  => ['required', 'min:3', 'max:10'],
        'alamat'         => ['required'],
        'tempat_lahir'   => ['required'],
        'tanggal_lahir'  => ['required', 'date'],
        'suku'           => ['required'],
        'agama'          => ['required'],
        'nomor_telepon'  => ['required', 'numeric'],
        'avatar'         => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],

        'mataPelajaran'  => ['required', 'array'],
        'jurusan'        => ['required', 'array']
      ];
    }

    public function validateCheckUnique ()
    {
      $this->validate([
        'nomor_telepon'   => ['unique:guru']
      ]);
    }

    public function createGuru ($fileName = null)
    {

      try {

        DB::transaction( function () use ($fileName) {

          $guru = Guru::create([
            'user_id'         => auth()->user()->id,
            'nama_lengkap'    => $this->nama_lengkap,
            'gelar_depan'     => $this->gelar_depan,
            'gelar_belakang'  => $this->gelar_belakang,
            'status'          => $this->status,
            'nip'             => $this->nip,
            'jenis_kelamin'   => $this->jenis_kelamin,
            'alamat'          => $this->alamat,
            'tempat_lahir'    => $this->tempat_lahir,
            'tanggal_lahir'   => $this->tanggal_lahir,
            'suku'            => $this->suku,
            'agama'           => $this->agama,
            'nomor_telepon'   => $this->nomor_telepon,
            'avatar'          => $fileName,
          ]);

          $guru->mataPelajaran()->attach($this->mataPelajaran);
          $guru->jurusan()->attach($this->jurusan);
        });

        $this->ssuccesCreate();

      } catch (\Exception $err) {
        $this->errorMessage('Terjadi kesalahan');
      }

    }

  public function updateGuru ($model, $fileName= null)
  {
    try {
      DB::transaction( function () use ($model, $fileName) {
        $model->update([
          'user_id'       => auth()->user()->id,
          'nama_lengkap'  => $this->nama_lengkap,
          'gelar_depan'   => $this->gelar_depan,
          'gelar_belakang'=> $this->gelar_belakang,
          'status'        => $this->status,
          'nip'           => $this->nip,
          'jenis_kelamin' => $this->jenis_kelamin,
          'alamat'        => $this->alamat,
          'tempat_lahir'  => $this->tempat_lahir,
          'tanggal_lahir' => $this->tanggal_lahir,
          'suku'          => $this->suku,
          'agama'         => $this->agama,
          'nomor_telepon' => $this->nomor_telepon,
          'avatar'        => $fileName,
        ]);
        $model->mataPelajaran()->sync($this->mataPelajaran);
        $model->jurusan()->sync($this->jurusan);
      });
    } catch (\Throwable $th) {
      $this->errorMessage('Terjadi ');
    }

  }
}
