<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoomsStatusSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan beberapa contoh data untuk tabel 'room_status_history'
        DB::table('room_status_history')->insert([
            [
                'room_id' => 1,  // Sesuaikan dengan ID kamar yang ada di tabel 'rooms'
                'user_id' => 1,  // Sesuaikan dengan ID pengguna yang ada di tabel 'users'
                'status' => 'Kosong',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'room_id' => 2,
                'user_id' => 2,  // Sesuaikan dengan ID pengguna yang ada di tabel 'users'
                'status' => 'Terisi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
