<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimoni';

    protected $fillable = [
      'nama',
      'avatar',
      'text'
    ];
  
    protected $appends = [
      'tanggal_buat',
      'tanggal_perbaharui',
      'file_storage'
    ];

    protected function textLimit () : Attribute
    {
      return Attribute::make(
        get: fn () =>  Str::limit($this->getAttribute('text'), 40, '...')
      );
    }

    // API
    protected function fileStorage () : Attribute
    {
      return Attribute::make(
        get: fn () => Storage::url($this->getAttribute('avatar'))
      );
    }

    // API
    protected function tanggalBuat () : Attribute
    {
      return Attribute::make(
        get : fn ($value) => Carbon::parse($value)->format('d-M-Y')
      );
    }

    // API
    protected function tanggalPerbaharui () : Attribute
    {
      return Attribute::make(
        get : fn ($value) => Carbon::parse($value)->format('d-M-Y')
      );
    }

}
