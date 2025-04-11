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
        Schema::create('desa_visis', function (Blueprint $table) {
            $table->id();
            $table->text('keterangan')->nullable();
            $table->longText('visi');
            $table->longText('misi');
            $table->string('gambar_visi')->nullable();
            $table->string('gambar_misi')->nullable();
            $table->boolean('status1')->default(0);
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
        Schema::dropIfExists('desa_visis');
    }
};
