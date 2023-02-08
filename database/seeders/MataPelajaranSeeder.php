<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      collect([
        'Pendidikan Agama dan Budi Pekerti',
        'Pendidikan Pancasila dan Kewarganegaraan',
        'Bahasa Indonesia',
        'Matematika',
        'Sejarah Indonesia',
        'Bahasa Inggris',
        'Seni Budaya',
        'Pendidikan Jasmani Olahraga dan Kesehatan',
        'Simulasi dan Komunikasi Digital',
        'Fisika',
        'Kimia',
        'Komputer dan Jaringan Dasar',
        'Pemrograman Dasar',
        'Desain Grafis',
        'Teknologi Jaringan Berbasis Luas (WAN)',
        'Administrasi Infrastruktur Jaringan',
        'Administrasi Sistem Jaringan',
        'Teknologi Layanan Jaringan',
        'Kewirausahaan',
        'Basis Data',
        'Pemrograman Web Bergerak']
      )->map( function ($data) {
        return MataPelajaran::create(['nama'  => $data]);
      });
    }
}
