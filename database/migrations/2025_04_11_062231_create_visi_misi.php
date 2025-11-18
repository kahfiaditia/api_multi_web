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
        Schema::create('cms_visi_misi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_web')->nullable();
            $table->foreign('id_web')->references('id')->on('cms_profils');
            $table->text('keterangan')->nullable();
            $table->longText('visi');
            $table->longText('misi');
            $table->string('path_gambar_visi', 95)->nullable();
            $table->string('path_gambar_misi', 95)->nullable();
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
        Schema::dropIfExists('cms_visi_misi');
    }
};
