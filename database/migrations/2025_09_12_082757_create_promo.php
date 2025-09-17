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
        Schema::create('cms_promo', function (Blueprint $table) {
            $table->id();
            $table->string('nama_promo', 20)->nullable();
            $table->string('order', 3)->nullable();
            $table->string('path_gambar', 95)->nullable();
            $table->text('icon', 25)->nullable();
            $table->string('status', 15)->nullable();
            $table->string('link', 15)->nullable();
            $table->text('deskripsi', 15)->nullable();
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
        Schema::dropIfExists('cms_promo');
    }
};
