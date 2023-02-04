<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Banner extends Model
{
  use HasFactory;

  protected $table = 'banner';

  protected $fillable = [
    'nama_banner'
  ];

  protected function tanggalBuat () : Attribute
  {
    return Attribute::make(
      get : fn ($value)  => Carbon::parse($value)->format('d-M-Y')
    );
  }
}
