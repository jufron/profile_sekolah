<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table = 'social_media';

    protected $fillable = ['logo', 'nama'];

    protected function logoMedium () : Attribute
    {
      return Attribute::make(
        get : fn () => Str::replace('fa-1x', 'fa-2x', $this->getAttribute('logo'))
      );
    }

    public function social_media_link ()
    {
      return $this->hasOne(SocialMediaLink::class);
    }
}
