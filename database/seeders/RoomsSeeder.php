<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomsSeeder extends Seeder
{
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'kos_name' => 'Kos Popo 1',
                'kamar_no' => 101,
                'kapasitas' => 2,
                'harga' => 1000000,
                'listrik_tambahan' => false,
                'status' => 'Kosong',
                'penghuni_id' => null,
                'tanggal_masuk' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kos_name' => 'Kos Popo 2',
                'kamar_no' => 102,
                'kapasitas' => 1,
                'harga' => 1500000,
                'listrik_tambahan' => true,
                'status' => 'Terisi',
                'penghuni_id' => 1, // Referensi ke akun 'John Doe'
                'tanggal_masuk' => '2024-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
