<?php

namespace App\Models;

use App\Http\Traits\DateTimeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialMediaLink extends Model
{
    use HasFactory, DateTimeTrait;

    protected $table = 'social_media_link';

    protected $fillable = [
      'social_media_id',
      'link'
    ];

    public function social_media ()
    {
      return $this->belongsTo(SocialMedia::class);
    }
}
