<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Membuat tabel 'payment'
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penghuni_id')->constrained('accounts')->cascadeOnDelete();
            $table->enum('kos_name', ['Kos Popo 1', 'Kos Popo 2', 'Kos Popo 3']);
            $table->integer('kamar_no');
            $table->decimal('harga_per_bulan', 10, 2);
            $table->decimal('listrik_tambahan', 10, 2)->default(0.00);
            $table->date('tanggal_tagihan');
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

        // Trigger untuk tabel `payment`
        DB::unprepared("
            CREATE TRIGGER validate_rekening_transfer_popo3
            BEFORE INSERT ON payment
            FOR EACH ROW
            BEGIN
                IF NEW.kos_name = 'Kos Popo 3' AND NEW.rekening_transfer != 'BNI 2' THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Pembayaran untuk Kos Popo 3 hanya dapat dilakukan melalui rekening BNI 2.';
                END IF;
            END;
        ");
    }

    public function down()
    {
        Schema::dropIfExists('payment');
        DB::unprepared("DROP TRIGGER IF EXISTS validate_rekening_transfer_popo3;");
    }
};
