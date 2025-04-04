<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pinjam', 20)->nullable();
            $table->unsignedBigInteger('id_siswa')->nullable();
            $table->foreign('id_siswa')->references('id')->on('member');
            $table->unsignedBigInteger('id_guru')->nullable();
            $table->foreign('id_guru')->references('id')->on('users');
            $table->date('tanggal_pinjam');
            $table->double('denda')->default(0);
            $table->integer('jumlah_hari')->default(0);
            $table->integer('jumlah_buku')->default(0);
            $table->string('nama_barcode', 80)->nullable();
            $table->enum('status', ['dipinjam', 'dikembalikan'])->default('dipinjam');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('detil_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pinjam')->nullable();
            $table->foreign('id_pinjam')->references('id')->on('data_peminjaman');
            $table->unsignedBigInteger('id_buku')->nullable();
            $table->foreign('id_buku')->references('id')->on('data_buku');
            $table->unsignedBigInteger('id_setting')->nullable();
            $table->foreign('id_setting')->references('id')->on('setting');
            $table->integer('jumlah');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detil_peminjaman');
        Schema::dropIfExists('data_peminjaman');
    }
};
