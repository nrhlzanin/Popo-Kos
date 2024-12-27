<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsSeeder extends Seeder
{
    public function run()
    {
        DB::table('accounts')->insert([
            [
                'nama' => 'John Doe',
                'alamat' => 'Jalan Merdeka No. 10, Jakarta',
                'tempat_tanggal_lahir' => '1990-01-01',
                'pekerjaan' => 'Mahasiswa',
                'keterangan_pekerjaan' => 'Teknik Informatika, Politeknik Negeri Malang',
                'semester' => 5,
                'no_wa' => '081234567890',
                'pj_pembayaran' => 'Ayah',
                'nama_pj' => 'Budi',
                'no_telp_pj' => '081234567891',
                'alamat_pj' => 'Jalan Raya No. 5, Jakarta',
                'foto' => null,
                'foto_ktp' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Jane Smith',
                'alamat' => 'Jalan Sejahtera No. 20, Surabaya',
                'tempat_tanggal_lahir' => '1992-02-15',
                'pekerjaan' => 'Pekerjaan Swasta',
                'keterangan_pekerjaan' => 'Marketing Manager, ABC Corp.',
                'semester' => null,
                'no_wa' => '081234567891',
                'pj_pembayaran' => 'Ibu',
                'nama_pj' => 'Siti',
                'no_telp_pj' => '081234567892',
                'alamat_pj' => 'Jalan Merdeka No. 8, Surabaya',
                'foto' => null,
                'foto_ktp' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
