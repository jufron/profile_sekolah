<?php

namespace App\Models;

use App\Http\Traits\DateTimeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Telepon extends Model
{
  use HasFactory, DateTimeTrait;

  protected $table = 'telepon';

  protected $fillable = [
    'nama',
    'nomor'
  ];
}
