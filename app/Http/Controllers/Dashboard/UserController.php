<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\AllertMessageTrait;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
  use AllertMessageTrait;

  public function index()
  {
    return view('dashboard.userManajement.userManajement', [
      'users'  =>  User::whereNotIn('name', ['super administrator'])
                      ->latest()
                      ->get()
    ]);
  }

  public function show(User $user)
  {
      //
  }

  public function edit(User $user)
  {
    return view('dashboard.userManajement.update', compact('user'));
  }

  public function update(Request $request, User $user)
  {
    if ($request->get('guru')) {
      $user->assignRole('guru');
      $this->ssuccesCreate('Berhasil membuat'. $user->name . 'menjadi guru');
      return to_route('user_manajement.index');
    } else {
      $user->removeRole('guru');
      $this->ssuccesCreate('Berhasil dinonaktifkan sebagai guru');
      return to_route('user_manajement.index');
    }
  }

  public function destroy(User $user)
  {
    try {
      $user->delete();
      $this->successDelete();
      return to_route('user-manajement.index');
    } catch (Exception $err) {
      $this->errorMessage('Tidak bisa menghapus data dikarenakan data tersebut masih berhubungan dengan jurnal kelas');
      return to_route('user_manajement.index');
    }
  }
}
