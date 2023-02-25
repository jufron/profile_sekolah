<?php

namespace App\Models;

use App\Http\Traits\DateTimeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
  use HasFactory;
  use DateTimeTrait;

  protected $table = 'mata_pelajaran';

  protected $fillable = [
    'nama'
  ];

  public function jurnalKellas ()
  {
    return $this->hasMany(JurnalKelas::class);
  }

  public function guru ()
  {
    return $this->belongsToMany(Guru::class)->withTimestamps();
  }
}
