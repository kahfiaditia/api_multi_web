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
        Schema::create('invoice_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengirim_id')->nullable();
            $table->foreign('pengirim_id')->references('id')->on('invoice_pengirim');
            $table->unsignedBigInteger('penerima_id')->nullable();
            $table->foreign('penerima_id')->references('id')->on('invoice_penerima');
            $table->string('keterangan_data', 100)->nullable();
            $table->string('nomor_invoice', 20)->nullable();
            $table->date('tanggal_invoice');
            $table->string('status_lunas',1)->nullable();
            $table->string('bank', 25)->nullable();
            $table->string('atas_nama', 35)->nullable();
            $table->string('nomor_rekening', 25)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id')->references('id')->on('invoice_data')->onDelete('cascade');
            $table->string('kode', 35)->nullable();
            $table->string('deskripsi', 100);
            $table->string('keterangan_items', 100)->nullable();
            $table->double('harga', 15, 2);
            $table->double('subtotal', 15, 2);
            $table->integer('kuantiti');
            $table->double('pajak', 15, 2)->nullable();
            $table->double('diskon', 15, 2)->nullable();
            $table->double('total', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
        Schema::dropIfExists('invoice_data');
    }
};
