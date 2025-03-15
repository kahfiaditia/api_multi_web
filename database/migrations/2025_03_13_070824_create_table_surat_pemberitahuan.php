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
        Schema::create('surat_pemberitahuan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_surat');
            $table->integer('pilih_nomor')->nullable();
            $table->string('nomor_surat',30)->nullable();
            $table->string('lampiran',3)->nullable();
            $table->string('nama_pengirim', 50);
            $table->string('barcode', 80)->nullable();
            $table->string('jabatan_pengirim', 50)->nullable();
            $table->string('nip_pengirim', 20)->nullable();
            $table->string('perihal', 80);
            $table->text('untuk')->nullable();
            $table->text('tembusan')->nullable();
            $table->longText('isi_surat');
            $table->string('status', 20)->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('dibuat_oleh');
            $table->foreign('dibuat_oleh')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pemberitahuan');
    }
};
