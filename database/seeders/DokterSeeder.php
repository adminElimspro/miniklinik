<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    public function run(): void
    {
        $dokter = [
            ['nama' => 'dr. Budi Santoso',      'spesialisasi' => 'Umum'],
            ['nama' => 'dr. Siti Rahayu, Sp.PD', 'spesialisasi' => 'Penyakit Dalam'],
            ['nama' => 'dr. Ahmad Fauzi, Sp.A',  'spesialisasi' => 'Anak'],
            ['nama' => 'drg. Dewi Kurnia',        'spesialisasi' => 'Gigi'],
            ['nama' => 'dr. Hendra Wijaya, Sp.JP','spesialisasi' => 'Jantung & Pembuluh Darah'],
        ];

        foreach ($dokter as $d) {
            Dokter::create($d);
        }
    }
}
