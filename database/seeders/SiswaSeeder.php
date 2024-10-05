<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Menghitung batas maksimal tanggal lahir (15 tahun sebelum tanggal saat ini)
        $maxDate = Carbon::now()->subYears(15)->format('Y-m-d');

        for ($i = 0; $i < 50; $i++) {
            // Membuat nomor hp secara acak diawali dengan 08
            $randomNumberLength = rand(8, 11);
            $randomNumber = $faker->numberBetween(10 ** ($randomNumberLength - 1), 10 ** $randomNumberLength - 1);
            $no_hp = '08' . $randomNumber;

            // Membuat asal sekolah acak diawali dengan SD, SMP, atau SMA
            $schoolPrefix = $faker->randomElement(['SD', 'SMP', 'SMA']);
            $schoolName = $schoolPrefix . ' ' . $faker->company;

            Siswa::create([
                'Nm_pendaftar' => $faker->name,
                'Alamat' => $faker->address,
                'Jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'No_hp' => $no_hp,
                'Asal_sekolah' => $schoolName,
                'Jurusan' => $faker->randomElement(['RPL', 'TKJ', 'MM']),
                'Tgl_lahir' => $faker->date($format = 'Y-m-d', $max = $maxDate),
                'NISN' => $faker->unique()->numberBetween(10000000000, 99999999999)
            ]);
        }
    }
}
