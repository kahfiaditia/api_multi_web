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
        Schema::create('penyimpanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_simpan', 20)->nullable();
            $table->date('tanggal')->nullable();
            $table->string('nama_barcode', 80)->nullable();
            $table->integer('jumlah')->nullable();
            $table->unsignedBigInteger('id_buku')->nullable();
            $table->foreign('id_buku')->references('id')->on('data_buku');
            $table->unsignedBigInteger('id_rak')->nullable();
            $table->foreign('id_rak')->references('id')->on('data_rak');
            $table->unsignedBigInteger('dibuat_oleh')->nullable();
            $table->foreign('dibuat_oleh')->references('id')->on('users');
            $table->string('keterangan', 80)->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyimpanan');
    }
};
