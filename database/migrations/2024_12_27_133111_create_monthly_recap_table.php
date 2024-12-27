<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('monthly_recap', function (Blueprint $table) {
            $table->id();
            $table->enum('kos_name', ['Kos Popo 1', 'Kos Popo 2', 'Kos Popo 3']);
            $table->integer('kamar_no');
            $table->integer('kapasitas');
            $table->decimal('harga_per_bulan', 10, 2);
            $table->string('nama_penghuni');
            $table->enum('bulan', ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agust', 'Sep', 'Okt', 'Nov', 'Des']);
            $table->year('tahun');
            $table->enum('status_pembayaran', ['Lunas', 'Belum Lunas', 'Kosong'])->default('Kosong');
            $table->decimal('nominal_pembayaran', 10, 2)->nullable();
            $table->enum('cara_pembayaran', ['Cash', 'Transfer'])->nullable();
            $table->enum('rekening_transfer', ['BRI', 'Mandiri', 'BNI 1', 'BSI', 'BNI 2', 'BCA'])->nullable();
            $table->timestamps();
        });
    }    

    public function down()
    {
        Schema::dropIfExists('monthly_recap');
    }
};
