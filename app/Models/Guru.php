<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
  use HasFactory;

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
