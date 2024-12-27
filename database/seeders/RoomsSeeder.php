<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoomsSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan beberapa contoh data untuk tabel 'rooms'
        DB::table('rooms')->insert([
            [
                'kos_name' => 'Kos Popo 1',
                'kamar_no' => 101,
                'kapasitas' => 2,
                'harga' => 1200000,
                'listrik_tambahan' => false,
                'status' => 'Kosong',
                'penghuni_id' => null,
                'tanggal_masuk' => null,
            ],
            [
                'kos_name' => 'Kos Popo 1',
                'kamar_no' => 102,
                'kapasitas' => 1,
                'harga' => 1000000,
                'listrik_tambahan' => true,
                'status' => 'Terisi',
                'penghuni_id' => 1, 
                'tanggal_masuk' => Carbon::now(),
            ],
            [
                'kos_name' => 'Kos Popo 2',
                'kamar_no' => 201,
                'kapasitas' => 2,
                'harga' => 1300000,
                'listrik_tambahan' => false,
                'status' => 'Kosong',
                'penghuni_id' => null,
                'tanggal_masuk' => null,
            ],
            [
                'kos_name' => 'Kos Popo 3',
                'kamar_no' => 301,
                'kapasitas' => 1, 
                'harga' => 1500000,
                'listrik_tambahan' => false,
                'status' => 'Terisi',
                'penghuni_id' => 2, 
                'tanggal_masuk' => Carbon::now(),
            ],
        ]);
    }
}
