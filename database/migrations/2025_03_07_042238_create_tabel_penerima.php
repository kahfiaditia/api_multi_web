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
        Schema::create('invoice_penerima', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pilih_pengirim')->nullable();
            $table->foreign('pilih_pengirim')->references('id')->on('invoice_pengirim');
            $table->string('nama_penerima');
            $table->string('divisi_penerima')->nullable();
            $table->string('jabatan_penerima')->nullable();
            $table->string('telepon_penerima')->nullable();
            $table->string('email_penerima');
            $table->text('alamat_penerima');
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
        Schema::dropIfExists('invoice_penerima');
    }
};
