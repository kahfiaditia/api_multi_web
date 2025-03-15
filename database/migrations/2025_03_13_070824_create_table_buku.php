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
        Schema::create('data_buku', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 60)->nullable();
            $table->string('nama_buku', 60)->nullable();
            $table->string('kategori', 60)->nullable();
            $table->integer('jumlah')->nullable();
            $table->double('harga')->nullable();
            $table->date('tanggal_pembelian')->nullable();
            $table->string('pengarang', 70);
            $table->string('penerbit', 50);
            $table->string('nama_barcode', 80)->nullable();
            $table->unsignedBigInteger('barcode_rak')->nullable();
            $table->foreign('barcode_rak')->references('id')->on('data_rak');
            $table->year('tahun')->nullable();
            $table->string('sumber_buku', 20)->nullable();
            $table->longText('deskripsi')->nullable();
            $table->string('status', 20)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_buku');
    }
};
