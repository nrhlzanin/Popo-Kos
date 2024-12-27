<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MonthlyRecapSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan beberapa contoh data untuk tabel 'monthly_recap'
        DB::table('monthly_recap')->insert([
            [
                'kos_name' => 'Kos Popo 1',
                'kamar_no' => 101,
                'kapasitas' => 2,
                'harga_per_bulan' => 1500000.00,
                'nama_penghuni' => 'Budi',
                'bulan' => 'Jan',
                'tahun' => 2024,
                'status_pembayaran' => 'Lunas',
                'nominal_pembayaran' => 1500000.00,
                'cara_pembayaran' => 'Cash',
                'rekening_transfer' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kos_name' => 'Kos Popo 2',
                'kamar_no' => 202,
                'kapasitas' => 1,
                'harga_per_bulan' => 1200000.00,
                'nama_penghuni' => 'Andi',
                'bulan' => 'Feb',
                'tahun' => 2024,
                'status_pembayaran' => 'Belum Lunas',
                'nominal_pembayaran' => null,
                'cara_pembayaran' => null,
                'rekening_transfer' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kos_name' => 'Kos Popo 3',
                'kamar_no' => 301,
                'kapasitas' => 1,
                'harga_per_bulan' => 1000000.00,
                'nama_penghuni' => 'Siti',
                'bulan' => 'Mar',
                'tahun' => 2024,
                'status_pembayaran' => 'Lunas',
                'nominal_pembayaran' => 1000000.00,
                'cara_pembayaran' => 'Transfer',
                'rekening_transfer' => 'BNI 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kos_name' => 'Kos Popo 1',
                'kamar_no' => 102,
                'kapasitas' => 2,
                'harga_per_bulan' => 1500000.00,
                'nama_penghuni' => 'Tina',
                'bulan' => 'Apr',
                'tahun' => 2024,
                'status_pembayaran' => 'Kosong',
                'nominal_pembayaran' => null,
                'cara_pembayaran' => null,
                'rekening_transfer' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
