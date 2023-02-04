<?php

namespace App\Http\Requests;

use App\Models\Testimoni;
use Illuminate\Foundation\Http\FormRequest;

class TestimoniRequest extends FormRequest
{
  public function authorize()
  {
      return true;
  }

  public function rules()
  {
    return [
      'nama'    => ['required', 'min:3', 'max:80'],
      'avatar'  => ['image', 'mimes:jpeg,png,jpg,gif', 'max:1024'],
      'text'    => ['required', 'min:20']
    ];
  }

  public function validateTestimoni ()
  {
    $this->validate([
      'nama'      => ['unique:testimoni'],
      'avatar'    => ['required'],
    ]);
  }

  public function createTestimoni ($namaFile)
  {
    Testimoni::create([
      'nama'      => $this->nama,
      'avatar'    => $namaFile,
      'text'      => $this->text
    ]);
  }

  public function updateTestimoni ($fileName, $testimoni)
  {
    $testimoni->update([
      'nama'    => $this->nama,
      'avatar'  => $fileName,
      'text'    => $this->text
    ]);
  }

}