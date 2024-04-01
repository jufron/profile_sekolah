<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Http\Traits\DateTimeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
  use HasFactory, DateTimeTrait;

  protected $table = 'guru';
  protected $fillable = [
    'user_id',
    'nama_lengkap',
    'gelar_depan',
    'gelar_belakang',
    'status',
    'nip',
    'jenis_kelamin',
    'alamat',
    'tempat_lahir',
    'tanggal_lahir',
    'suku',
    'agama',
    'nomor_telepon',
    'avatar'
  ];

  protected $appends = [
    'tanggal_buat',
    'tanggal_perbaharui',
    'avatar_storage',
    'tempat_tanggal_lahir'
  ];

  protected function avatarStorage () : Attribute
  {
    return Attribute::make(
      get: fn () => Storage::url($this->getAttribute('avatar'))
    );
  }

  protected function tempatTanggalLahir () : Attribute
  {
    return Attribute::make(
      get : fn () => Carbon::parse($this->getAttribute('tanggal_lahir'))->format('d M Y')
    );
  }

  public function mataPelajaran ()
  {
    return $this->belongsToMany(MataPelajaran::class, 'guru_mata_pelajaran')->withTimestamps();
  }

  public function jurusan ()
  {
    return $this->belongsToMany(Jurusan::class, 'guru_jurusan')->withTimestamps();
  }

  public function user ()
  {
    return $this->belongsTo(User::class);
  }
}
