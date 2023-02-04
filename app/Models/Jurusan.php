<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan';

    protected $fillable = [
      'nama',
      'poster',
      'singkatan',
      'terjemahan',
      'deskripsi'
    ];

    protected $appends = [
      'tanggal_buat',
      'tanggal_perbaharui',
      'file_storage',
      'singkatan_is_null'
    ];

    protected function singkatanIsNull () : Attribute
    {
      return Attribute::make(
        get : fn () => $this->getAttribute('singkatan') ?? ''
      );
    }

    protected function fileStorage () : Attribute
    {
      return Attribute::make(
        get: fn () => Storage::url($this->getAttribute('poster'))
      );
    }

    protected function textLimit () : Attribute
    {
      return Attribute::make(
        get: fn () =>  Str::limit($this->getAttribute('deskripsi'), 40, '...')
      );
    }

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
