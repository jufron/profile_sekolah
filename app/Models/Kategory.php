<?php

namespace App\Models;

use App\Http\Traits\DateTimeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategory extends Model
{
  use HasFactory, DateTimeTrait;

  protected $table = 'kategory';

  protected $fillable = [
    'nama'
  ];

  protected $appends = [
    'tanggal_buat',
    'tanggal_perbaharui'
  ];

  public function berita ()
  {
    return $this->hasMany(Berita::class);
  }
}
