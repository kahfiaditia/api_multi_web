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
        Schema::create('cms_produks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_web')->nullable();
            $table->foreign('id_web')->references('id')->on('cms_profils');
            $table->string('nama_produk', 100);
            $table->string('deskripsi', 250)->nullable();
            $table->decimal('harga_normal', 15, 2)->default(0);
            $table->decimal('harga_diskon', 15, 2)->default(0);
            $table->text('keterangan', 200)->nullable();
            $table->string('path_gambar', 95)->nullable();
            $table->string('status', 15)->nullable();
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
        Schema::dropIfExists('cms_produks');
    }
};
