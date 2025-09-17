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
        Schema::create('cms_detil_produk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produk');
            $table->foreign('id_produk')->references('id')->on('cms_produks');
            $table->string('deskripsi', 20)->nullable();
            $table->decimal('harga_normal', 15, 2)->default(0);
            $table->decimal('harga_diskon', 15, 2)->default(0);
            $table->text('keterangan', 200)->nullable();
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
        Schema::dropIfExists('cms_detil_produk');
    }
};
