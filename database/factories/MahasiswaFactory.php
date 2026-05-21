<?php

namespace Database\Factories;

use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $angkatan = fake()->numberBetween(2019, 2024);

        // Ambil prodi_id secara acak dari data yang sudah ada di database
        $prodiId = Prodi::inRandomOrder()->value('id');
        return [
            'prodi_id'  => $prodiId,
            'nim'       => $angkatan . fake()->unique()->numerify('######'),
            'nama'      => fake()->name(),
            'email'     => fake()->unique()->safeEmail(),
            'angkatan'  => $angkatan,
            'status'    => fake()->randomElement([
                'aktif',
                'aktif',
                'aktif',
                'cuti',
                'lulus'
            ]),
            'no_hp'     => '08' . fake()->numerify('##########'),
            'alamat'    => fake()->address(),
            'foto'      => null,
        ];
    }
}
