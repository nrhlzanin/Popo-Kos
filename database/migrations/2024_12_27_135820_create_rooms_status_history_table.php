<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('room_status_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms'); // Relasi dengan tabel 'rooms'
            $table->foreignId('user_id')->constrained('users'); // Relasi dengan tabel 'users'
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_status_history');
    }
};
