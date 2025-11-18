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
        Schema::create('cms_blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_web')->nullable();
            $table->foreign('id_web')->references('id')->on('cms_profils');
            $table->string('judul', 150);
            $table->string('kategori', 50)->nullable();
            $table->string('status', 50); // Bisa untuk draft/publish misalnya
            $table->text('isi'); // Konten artikel
            $table->string('path_gambar1', 95)->nullable(); // Nama file gambar
            $table->string('path_gambar2', 95)->nullable();
            $table->string('path_gambar3', 95)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_blogs');
    }
};
