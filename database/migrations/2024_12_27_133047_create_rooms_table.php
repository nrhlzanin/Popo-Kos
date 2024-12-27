<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Membuat tabel 'rooms'
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->enum('kos_name', ['Kos Popo 1', 'Kos Popo 2', 'Kos Popo 3']);
            $table->integer('kamar_no');
            $table->integer('kapasitas');
            $table->decimal('harga', 10, 2);
            $table->boolean('listrik_tambahan')->default(false);
            $table->enum('status', ['Kosong', 'Terisi'])->default('Kosong');
            $table->foreignId('penghuni_id')->nullable()->constrained('accounts')->nullOnDelete();
            $table->date('tanggal_masuk')->nullable();
        });

        // Trigger untuk tabel `rooms`
        DB::unprepared("
            CREATE TRIGGER set_kapasitas_insert
            BEFORE INSERT ON rooms
            FOR EACH ROW
            BEGIN
                IF NEW.kos_name = 'Kos Popo 3' THEN
                    SET NEW.kapasitas = 1;
                ELSEIF NEW.kos_name IN ('Kos Popo 1', 'Kos Popo 2') THEN
                    IF NEW.kapasitas NOT IN (1, 2) THEN
                        SIGNAL SQLSTATE '45000'
                        SET MESSAGE_TEXT = 'Kapasitas untuk Kos Popo 1 dan Kos Popo 2 harus 1 atau 2.';
                    END IF;
                END IF;
            END;
        ");

        DB::unprepared("
            CREATE TRIGGER set_kapasitas_update
            BEFORE UPDATE ON rooms
            FOR EACH ROW
            BEGIN
                IF NEW.kos_name = 'Kos Popo 3' THEN
                    SET NEW.kapasitas = 1;
                ELSEIF NEW.kos_name IN ('Kos Popo 1', 'Kos Popo 2') THEN
                    IF NEW.kapasitas NOT IN (1, 2) THEN
                        SIGNAL SQLSTATE '45000'
                        SET MESSAGE_TEXT = 'Kapasitas untuk Kos Popo 1 dan Kos Popo 2 harus 1 atau 2.';
                    END IF;
                END IF;
            END;
        ");
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
        DB::unprepared("DROP TRIGGER IF EXISTS set_kapasitas_insert;");
        DB::unprepared("DROP TRIGGER IF EXISTS set_kapasitas_update;");
    }
};
