<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategory extends Model
{
  use HasFactory;

  protected $table = 'kategory';

  protected $fillable = [
    'nama'
  ];

  protected $appends = [
    'tanggal_buat',
    'tanggal_perbaharui'
  ];

  protected function tanggalBuat () : Attribute
  {
    return Attribute::make(
      get : fn ($value) => Carbon::parse($value)->format('d-M-Y')
    );
  }

  protected function tanggalPerbaharui () : Attribute
  {
    return Attribute::make(
      get : fn ($value) => Carbon::parse($value)->format('d-M-Y')
    );
  }

  public function berita ()
  {
    return $this->hasMany(Berita::class);
  }
}
