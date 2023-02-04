<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
  use HasFactory;

  protected $table = 'berita';

  protected $fillable = [
    'judul',
    'avatar',
    'slug',
    'kategory_id',
    'user_id',
    'publish_status',
    'body'
  ];

  // baca referensi database design untuk berita

  // relasi
  public function user ()
  {
    return $this->belongsTo(User::class);
  }

  public function kategory ()
  {
    return $this->belongsTo(Kategory::class);
  }
}
