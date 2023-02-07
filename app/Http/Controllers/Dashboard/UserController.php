<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    return view('dashboard.userManajement.userManajement', [
      'user'  =>  User::latest()->get()
    ]);
  }

  public function show(User $user)
  {
      //
  }

  public function edit(User $user)
  {
    return view('dashboard.userManajement.update');
  }

  public function update(Request $request, User $user)
  {
      //
  }

  public function destroy(User $user)
  {
      //
  }
}
