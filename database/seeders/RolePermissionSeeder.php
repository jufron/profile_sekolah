<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
      // permission
      collect([
        'laporan jurnal',
        'laporan absen',
        'laporan guru'
      ])->map( function ($value) {
        return Permission::create(['name' => $value]);
      });

      collect([
        'super-admin',
        'guru',
        'user',
        'siswa'
      ])->map( function ($value) {
        return Role::create(['name' => $value]);
      });

    }
}
