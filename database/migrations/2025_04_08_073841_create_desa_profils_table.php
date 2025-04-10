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
        Schema::create('desa_profils', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pos', 10)->nullable();
            $table->string('nama_desa', 45);
            $table->string('provinsi', 45);
            $table->string('kabupaten', 45);
            $table->string('kecamatan', 45);
            $table->integer('jumlah_rt')->nullable();;
            $table->integer('jumlah_rw')->nullable();;
            $table->string('telepon')->nullable();;
            $table->string('email')->nullable();;
            $table->text('deskripsi')->nullable();;
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desa_profils');
    }
};
