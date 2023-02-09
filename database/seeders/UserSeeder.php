<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
      $user = User::create([
        'name'                    => config('superAdmin.admin-name'),
        'email'                   => config('superAdmin.admin-email'),
        'email_verified_at'       => now(),
        'password'                => Hash::make(config('superAdmin.admin-password')),
        'remember_token'          => Str::random(10)
      ]);
      $user->assignRole('super-admin');
      $user->givePermissionTo(['laporan jurnal', 'laporan absen', 'laporan guru']);
    }
}
