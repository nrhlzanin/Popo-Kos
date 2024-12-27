<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Relasi dengan tabel 'users'
            $table->string('ip_address')->nullable(); // Alamat IP pengguna
            $table->string('user_agent')->nullable(); // Informasi browser pengguna
            $table->timestamp('last_activity')->nullable(); // Waktu terakhir aktivitas
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
};
