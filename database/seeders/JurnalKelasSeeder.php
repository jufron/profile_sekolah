<?php

namespace Database\Seeders;

use App\Models\JurnalKelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurnalKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      JurnalKelas::factory()->count(500)->create();
    }
}
