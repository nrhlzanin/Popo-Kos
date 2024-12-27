<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonthlyRecapSeeder extends Seeder
{
    public function run()
    {
        DB::table('monthly_recap')->insert([
            [
                'kos_name' => 'Kos Popo 1',
                'kamar_no' => 101,
                'kapasitas' => 2,
                'harga_per_bulan' => 1000000,
                'nama_penghuni' => 'John Doe',
                'bulan' => 'Jan',
                'tahun' => 2024,
                'status_pembayaran' => 'Lunas',
                'nominal_pembayaran' => 1000000,
                'cara_pembayaran' => 'Cash',
                'rekening_transfer' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
