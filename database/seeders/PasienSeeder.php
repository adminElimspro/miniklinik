<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    public function run(): void
    {
        $pasien = [
            ['no_rm' => 'RM0001', 'nama' => 'Agus Setiawan',    'tgl_lahir' => '1985-03-12', 'jenis_kelamin' => 'L', 'alamat' => 'Jl. Merdeka No. 1, Jakarta',    'no_hp' => '081234567890'],
            ['no_rm' => 'RM0002', 'nama' => 'Budi Prasetyo',    'tgl_lahir' => '1990-07-25', 'jenis_kelamin' => 'L', 'alamat' => 'Jl. Sudirman No. 5, Bandung',    'no_hp' => '082345678901'],
            ['no_rm' => 'RM0003', 'nama' => 'Citra Dewi',       'tgl_lahir' => '1992-11-08', 'jenis_kelamin' => 'P', 'alamat' => 'Jl. Gatot Subroto No. 10, Surabaya', 'no_hp' => '083456789012'],
            ['no_rm' => 'RM0004', 'nama' => 'Dedi Kurniawan',   'tgl_lahir' => '1978-05-17', 'jenis_kelamin' => 'L', 'alamat' => 'Jl. Ahmad Yani No. 22, Yogyakarta', 'no_hp' => '084567890123'],
            ['no_rm' => 'RM0005', 'nama' => 'Eka Putri',        'tgl_lahir' => '2000-01-30', 'jenis_kelamin' => 'P', 'alamat' => 'Jl. Diponegoro No. 7, Semarang',  'no_hp' => '085678901234'],
            ['no_rm' => 'RM0006', 'nama' => 'Fajar Nugroho',    'tgl_lahir' => '1983-09-04', 'jenis_kelamin' => 'L', 'alamat' => 'Jl. Pemuda No. 3, Malang',        'no_hp' => '086789012345'],
            ['no_rm' => 'RM0007', 'nama' => 'Gita Lestari',     'tgl_lahir' => '1995-12-19', 'jenis_kelamin' => 'P', 'alamat' => 'Jl. Pahlawan No. 8, Medan',       'no_hp' => '087890123456'],
            ['no_rm' => 'RM0008', 'nama' => 'Hendra Saputra',   'tgl_lahir' => '1988-04-27', 'jenis_kelamin' => 'L', 'alamat' => 'Jl. Veteran No. 14, Makassar',    'no_hp' => '088901234567'],
            ['no_rm' => 'RM0009', 'nama' => 'Indah Permata',    'tgl_lahir' => '1997-08-13', 'jenis_kelamin' => 'P', 'alamat' => 'Jl. Hayam Wuruk No. 6, Denpasar', 'no_hp' => '089012345678'],
            ['no_rm' => 'RM0010', 'nama' => 'Joko Susilo',      'tgl_lahir' => '1975-02-22', 'jenis_kelamin' => 'L', 'alamat' => 'Jl. MT Haryono No. 9, Palembang', 'no_hp' => '081123456789'],
            ['no_rm' => 'RM0011', 'nama' => 'Kartika Sari',     'tgl_lahir' => '1993-06-05', 'jenis_kelamin' => 'P', 'alamat' => 'Jl. Imam Bonjol No. 11, Balikpapan', 'no_hp' => '082234567890'],
            ['no_rm' => 'RM0012', 'nama' => 'Luthfi Hakim',     'tgl_lahir' => '1987-10-31', 'jenis_kelamin' => 'L', 'alamat' => 'Jl. Monginsidi No. 2, Manado',    'no_hp' => '083345678901'],
            ['no_rm' => 'RM0013', 'nama' => 'Maya Anggraini',   'tgl_lahir' => '1999-03-16', 'jenis_kelamin' => 'P', 'alamat' => 'Jl. Pangeran No. 4, Pekanbaru',   'no_hp' => '084456789012'],
            ['no_rm' => 'RM0014', 'nama' => 'Nugroho Adi',      'tgl_lahir' => '1981-07-09', 'jenis_kelamin' => 'L', 'alamat' => 'Jl. Kartini No. 17, Banjarmasin', 'no_hp' => '085567890123'],
            ['no_rm' => 'RM0015', 'nama' => 'Oktavia Wulandari','tgl_lahir' => '1996-11-24', 'jenis_kelamin' => 'P', 'alamat' => 'Jl. Sisingamangaraja No. 13, Kupang', 'no_hp' => '086678901234'],
            ['no_rm' => 'RM0016', 'nama' => 'Prasetyo Budi',    'tgl_lahir' => '1984-01-18', 'jenis_kelamin' => 'L', 'alamat' => 'Jl. Cut Nyak Dien No. 20, Banda Aceh', 'no_hp' => '087789012345'],
            ['no_rm' => 'RM0017', 'nama' => 'Qorina Hasanah',   'tgl_lahir' => '2001-05-07', 'jenis_kelamin' => 'P', 'alamat' => 'Jl. Rajawali No. 15, Pontianak',  'no_hp' => '088890123456'],
            ['no_rm' => 'RM0018', 'nama' => 'Rizki Ramadhan',   'tgl_lahir' => '1998-09-14', 'jenis_kelamin' => 'L', 'alamat' => 'Jl. Sultan Hasanuddin No. 18, Jayapura', 'no_hp' => '089901234567'],
            ['no_rm' => 'RM0019', 'nama' => 'Sari Indraswari',  'tgl_lahir' => '1991-12-03', 'jenis_kelamin' => 'P', 'alamat' => 'Jl. Teuku Umar No. 21, Mataram',  'no_hp' => '081012345678'],
            ['no_rm' => 'RM0020', 'nama' => 'Teguh Wibowo',     'tgl_lahir' => '1979-06-28', 'jenis_kelamin' => 'L', 'alamat' => 'Jl. Wolter Monginsidi No. 16, Ambon', 'no_hp' => '082112345678'],
        ];

        foreach ($pasien as $p) {
            Pasien::create($p);
        }
    }
}
