<?php

namespace App\Models;

use App\Http\Traits\DateTimeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  use HasFactory;
  use DateTimeTrait;

  protected $table = 'banner';

  protected $fillable = [
    'nama_banner'
  ];
}
