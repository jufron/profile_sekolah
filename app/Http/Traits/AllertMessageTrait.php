<?php

namespace App\Http\Traits;


trait AllertMessageTrait {

  private function swetAllert ($message)
  {
    return alert()->success('Berhasil', $message);
  }

  protected function ssuccesCreate ($message = 'berhasil tersimpan')
  {
    return $this->swetAllert($message);
  }

  protected function successUpdate ($message = 'berhasil Diperbaharui')
  {
    return $this->swetAllert($message);
  }

  protected function successDelete ($message = 'Berhasil Terhapus')
  {
    return $this->swetAllert($message);
  }
}