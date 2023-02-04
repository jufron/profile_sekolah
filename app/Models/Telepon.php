<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Telepon extends Model
{
  use HasFactory;

  protected $table = 'telepon';

  protected $fillable = [
    'nama',
    'nomor'
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

}
