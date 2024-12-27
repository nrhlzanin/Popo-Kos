<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Relasi dengan tabel 'users'
            $table->string('token', 64)->unique(); // Token akses yang unik
            $table->timestamp('created_at')->useCurrent(); // Waktu pembuatan token
            $table->timestamp('expires_at')->nullable(); // Waktu kadaluarsa token, jika ada
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
