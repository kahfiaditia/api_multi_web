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
        Schema::create('desa_blogs', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 150);
            $table->string('kategori', 50)->nullable();
            $table->string('status', 50); // Bisa untuk draft/publish misalnya
            $table->text('isi'); // Konten artikel
            $table->string('gambar1')->nullable(); // Nama file gambar
            $table->string('gambar2')->nullable();
            $table->string('gambar3')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desa_blogs');
    }
};
