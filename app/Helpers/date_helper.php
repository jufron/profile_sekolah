<?php

use Illuminate\Support\Carbon;


function dateFormat ($value) {
  return Carbon::parse($value)->format('Y m d');
}
