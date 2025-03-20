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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pinjam', 20)->nullable();
            $table->date('tanggal')->nullable();
            $table->unsignedBigInteger('id_member')->nullable();
            $table->foreign('id_member')->references('id')->on('member');
            $table->unsignedBigInteger('id_buku')->nullable();
            $table->foreign('id_buku')->references('id')->on('data_buku');
            $table->unsignedBigInteger('id_setting')->nullable();
            $table->foreign('id_setting')->references('id')->on('setting');
            $table->unsignedBigInteger('dibuat_oleh')->nullable();
            $table->foreign('dibuat_oleh')->references('id')->on('users');
            $table->string('barcode_pinjam', 80)->nullable();
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
        Schema::dropIfExists('peminjaman');
    }
};
