<?php

function checkRole ($data) {

  if ($data->hasRole('super-admin') ) {
    return '<span class="badge badge-success">Super Admin</span>';
  } else if ($data->hasRole('guru')) {
    return '<span class="badge badge-info">Guru</span>';
  } else {
    return '<span class="badge badge-secondary">Tidak Ada</span>';
  }
}
