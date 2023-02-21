<?php

namespace Database\Factories;

use App\Models\{
  User,
  Jurusan,
  MataPelajaran
};

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JurnalKelas>
 */
class JurnalKelasFactory extends Factory
{
  public function definition()
  {
    $user = User::pluck('id')->toArray();
    $mataPelajaran = MataPelajaran::pluck('id')->toArray();
    $kelas = ['X', 'XI', 'XII'];
    $jurusan =Jurusan::pluck('id')->toArray();
    $jam_ke = ['1-2', '1-4', '1-6'];

    return [
      'user_id'               => $this->faker->randomElement($user),
      'tanggal'               => now(),
      'mata_pelajaran_id'     => $this->faker->randomElement($mataPelajaran),
      'kelas'                 => $this->faker->randomElement($kelas),
      'jurusan_id'            => $this->faker->randomElement($jurusan),
      'jam_ke'                => $this->faker->randomElement($jam_ke),
      'materi_pokok'          => $this->faker->sentence(),
      'sakit'                 => $this->faker->randomElement([1, 2, 3, 4]),
      'ijin'                  => $this->faker->randomElement([1, 2, 3, 4]),
      'alpha'                 => $this->faker->randomElement([1, 2, 3, 4]),
      'arship_status'         => false
    ];
  }
}
