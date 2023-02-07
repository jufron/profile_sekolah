<?php

namespace App\Models;

use App\Http\Traits\DateTimeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPertanyaan extends Model
{
  use HasFactory;
  use DateTimeTrait;

  protected $table = 'daftar_pertanyaan';

  protected $fillable = [
    'pertanyaan',
    'jawaban'
  ];


}
