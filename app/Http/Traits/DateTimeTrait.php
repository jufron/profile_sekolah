<?php

namespace App\Http\Traits;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

trait DateTimeTrait {

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
