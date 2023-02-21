<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Http\Traits\DateTimeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JurnalKelas extends Model
{
  use HasFactory;
  use DateTimeTrait;

  protected $table = 'jurnal_kelas';
  protected $fillable = [
    'user_id',
    'tanggal',  // tanggal mengajar
    'mata_pelajaran_id',
    'kelas',
    'jurusan_id',
    'jam_ke',
    'materi_pokok',
    'sakit',
    'ijin',
    'alpha',
    'arship_status'
  ];

  protected $appends = [
    'tanggal_buat',
    'tanggal_perbaharui',
    'tanggal_ngajar',
    'text_limit'
  ];

  protected function tanggalNgajar () : Attribute
  {
    return Attribute::make(
      get : fn ($value) => Carbon::parse($value)
                                  ->locale('id')
                                  ->format('l, d F Y')
    );
  }

  protected function textLimit () : Attribute
  {
    return Attribute::make(
      get: fn () =>  Str::limit($this->getAttribute('materi_pokok'), 70, '...')
    );
  }

  public function user ()
  {
    return $this->belongsTo(User::class);
  }

  public function mataPelajaran ()
  {
    return $this->belongsTo(MataPelajaran::class);
  }

  public function jurusan ()
  {
    return $this->belongsTo(Jurusan::class);
  }
}
