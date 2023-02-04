<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialMediaLink extends Model
{
    use HasFactory;

    protected $table = 'social_media_link';

    protected $fillable = [
      'social_media_id',
      'link'
    ];

    public function social_media ()
    {
      return $this->belongsTo(SocialMedia::class);
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
