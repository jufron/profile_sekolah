<?php

use Illuminate\Support\Carbon;


function dateFormat ($value) {
  return Carbon::parse($value)->format('Y m d');
}

function dateFormat2 ($value) {
  return Carbon::parse($value)->format('Y-m-d');
}

function dateTimeFormat ($value) {
  return Carbon::parse($value)->format('d M Y');
}
