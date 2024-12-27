<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentHistorySeeder extends Seeder
{
    public function run()
    {
        DB::table('payment_history')->insert([
            [
                'penghuni_id' => 1, // Referensi ke akun 'John Doe'
                'kos_name' => 'Kos Popo 1',
                'kamar_no' => 101,
                'harga_per_bulan' => 1000000,
                'listrik_tambahan' => 0,
                'tanggal_pembayaran' => '2024-01-01',
                'jumlah_bulan' => 1,
                'bulan_mulai' => '2024-01-01',
                'nominal_pembayaran' => 1000000,
                'cara_pembayaran' => 'Cash',
                'rekening_transfer' => null,
                'bukti_tf' => null,
                'keterangan' => 'Pembayaran bulan Januari',
                'status_validasi' => 'Tervalidasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
