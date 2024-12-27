<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Membuat tabel 'accounts'
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->date('tempat_tanggal_lahir');
            $table->enum('pekerjaan', ['Mahasiswa', 'Pekerjaan Swasta', 'BUMN', 'PNS', 'Lainnya']);
            $table->string('keterangan_pekerjaan')->nullable();
            $table->integer('semester')->nullable();
            $table->string('no_wa', 15);
            $table->enum('pj_pembayaran', ['Ayah', 'Ibu', 'Diri Sendiri', 'Lainnya']);
            $table->string('nama_pj')->nullable();
            $table->string('no_telp_pj', 15)->nullable();
            $table->text('alamat_pj')->nullable();
            $table->binary('foto')->nullable();
            $table->binary('foto_ktp')->nullable();
            $table->timestamps();
        });

        // Trigger untuk tabel `accounts`
        DB::unprepared("
            CREATE TRIGGER validate_keterangan_pekerjaan_insert
            BEFORE INSERT ON accounts
            FOR EACH ROW
            BEGIN
                IF NEW.pekerjaan IN ('Mahasiswa', 'Lainnya') AND (NEW.keterangan_pekerjaan IS NULL OR NEW.keterangan_pekerjaan = '') THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Kolom keterangan_pekerjaan harus diisi jika pekerjaan adalah Mahasiswa atau Lainnya.';
                END IF;
            END;
        ");

        DB::unprepared("
            CREATE TRIGGER validate_keterangan_pekerjaan_update
            BEFORE UPDATE ON accounts
            FOR EACH ROW
            BEGIN
                IF NEW.pekerjaan IN ('Mahasiswa', 'Lainnya') AND (NEW.keterangan_pekerjaan IS NULL OR NEW.keterangan_pekerjaan = '') THEN
                    SIGNAL SQLSTATE '45000'
                    SET MESSAGE_TEXT = 'Kolom keterangan_pekerjaan harus diisi jika pekerjaan adalah Mahasiswa atau Lainnya.';
                END IF;
            END;
        ");
    }

    public function down()
    {
        Schema::dropIfExists('accounts');
        DB::unprepared("DROP TRIGGER IF EXISTS validate_keterangan_pekerjaan_insert;");
        DB::unprepared("DROP TRIGGER IF EXISTS validate_keterangan_pekerjaan_update;");
    }
};
