<?php

namespace App\Models;

use App\Http\Traits\DateTimeTrait;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurusan extends Model
{
    use HasFactory, DateTimeTrait;

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

    public function jurnalKelas ()
    {
      return $this->hasMany(JurnalKelas::class);
    }
}
