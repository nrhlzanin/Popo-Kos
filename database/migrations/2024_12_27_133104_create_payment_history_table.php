<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payment_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penghuni_id')->constrained('accounts')->cascadeOnDelete();
            $table->enum('kos_name', ['Kos Popo 1', 'Kos Popo 2', 'Kos Popo 3']);
            $table->integer('kamar_no');
            $table->decimal('harga_per_bulan', 10, 2);
            $table->decimal('listrik_tambahan', 10, 2)->default(0.00);
            $table->date('tanggal_pembayaran');
            $table->integer('jumlah_bulan');
            $table->date('bulan_mulai');
            $table->decimal('nominal_pembayaran', 10, 2);
            $table->enum('cara_pembayaran', ['Cash', 'Transfer']);
            $table->enum('rekening_transfer', ['BRI', 'Mandiri', 'BNI 1', 'BSI', 'BNI 2', 'BCA'])->nullable();
            $table->binary('bukti_tf')->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('status_validasi', ['Tervalidasi', 'Belum Validasi'])->default('Belum Validasi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payment_history');
    }
};
