<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Guru::create([
        'user_id'           => 1,
        'nama_lengkap'      => 'jufron tamo ama',
        'gelar_depan'       => '-',
        'gelar_belakang'    => 'S.Kom',
        'status'            => 'guru',
        'nip'               => '-',
        'jenis_kelamin'     => 'laki-laki',
        'alamat'            => 'sikumana jalur 40',
        'tempat_lahir'      => 'kupang',
        'tanggal_lahir'     => now(),
        'suku'              => 'sumba barat',
        'agama'             => 'kristen protestan',
        'nomor_telepon'     => '082147554549'
      ]);
    }
}
