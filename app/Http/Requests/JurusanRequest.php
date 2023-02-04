<?php

namespace App\Http\Requests;

use App\Models\Jurusan;
use Illuminate\Foundation\Http\FormRequest;

class JurusanRequest extends FormRequest
{
  public function authorize()
  {
      return true;
  }

  public function rules()
  {
    return [
      'nama'         => ['required', 'min:4', 'max:40'],
      'poster'       => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
      'singkatan'    => ['nullable', 'min:2', 'max:30'],
      'terjemahan'   => ['required', 'max:60'],
      'deskripsi'    => ['required', 'min:20']
    ];
  }

  public function createJurusan ($fileName)
  {
    Jurusan::create([
      'nama'        => $this->nama,
      'poster'      => $fileName,
      'singkatan'   => $this->singkatan,
      'terjemahan'  => $this->terjemahan,
      'deskripsi'   => $this->deskripsi
    ]);
  }

  public function validateCheck ()
  {
    $this->validate([
      'poster'  => ['required'],
      'nama'    => ['unique:jurusan']
    ]);
  }

  public function updateJurusan ($fileName, $jurusan)
  {
    $jurusan->update([
      'nama'        => $this->nama,
      'poster'      => $fileName,
      'singkatan'   => $this->singkatan,
      'terjemahan'  => $this->terjemahan,
      'deskripsi'   => $this->deskripsi
    ]);
  }
}
