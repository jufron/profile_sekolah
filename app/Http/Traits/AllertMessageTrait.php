<?php

namespace App\Http\Traits;


trait AllertMessageTrait {

  private function swetAllertSuccess ($message)
  {
    return alert()->success('Berhasil', $message);
  }

  private function swetAllertError ($message)
  {
    return alert()->error('Terjadi Error', $message);
  }

  protected function ssuccesCreate ($message = 'berhasil tersimpan')
  {
    return $this->swetAllertSuccess($message);
  }

  protected function successUpdate ($message = 'berhasil Diperbaharui')
  {
    return $this->swetAllertSuccess($message);
  }

  protected function successDelete ($message = 'Berhasil Terhapus')
  {
    return $this->swetAllertSuccess($message);
  }

  protected function successArship ($message = 'Berhasil Diarship')
  {
    return $this->swetAllertSuccess($message);
  }

  protected function errorMessage ($message = 'Terjadi error')
  {
    return $this->swetAllertError($message);
  }
}