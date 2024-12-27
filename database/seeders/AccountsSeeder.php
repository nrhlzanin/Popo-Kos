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
                'user_id' => 1,
                'nama' => 'John Doe',
                'alamat' => 'Jl. Merdeka No. 123, Jakarta',
                'tempat_tanggal_lahir' => '1990-01-01',
                'pekerjaan' => 'Mahasiswa',
                'keterangan_pekerjaan' => 'Universitas XYZ',
                'semester' => 5,
                'no_wa' => '08123456789',
                'pj_pembayaran' => 'Ayah',
                'nama_pj' => 'Bapak John',
                'no_telp_pj' => '08567890123',
                'alamat_pj' => 'Jl. Raya No. 45, Jakarta',
                'foto' => null,
                'foto_ktp' => null,
            ],
            [
                'user_id' => 2,
                'nama' => 'Jane Smith',
                'alamat' => 'Jl. Sudirman No. 456, Jakarta',
                'tempat_tanggal_lahir' => '1992-05-15',
                'pekerjaan' => 'Pekerjaan Swasta',
                'keterangan_pekerjaan' => 'Karyawan di PT ABC',
                'semester' => null,
                'no_wa' => '08567812345',
                'pj_pembayaran' => 'Diri Sendiri',
                'nama_pj' => null,
                'no_telp_pj' => null,
                'alamat_pj' => null,
                'foto' => null,
                'foto_ktp' => null,
            ],
        ]);
    }
}
