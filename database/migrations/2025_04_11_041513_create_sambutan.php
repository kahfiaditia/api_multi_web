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
        Schema::create('cms_sambutans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_web')->nullable();
            $table->foreign('id_web')->references('id')->on('cms_profils');
            $table->string('nama')->nullable();
            $table->text('area')->nullable(); // HTML content
            $table->string('path_sambutan', 95)->nullable(); // path gambar
            $table->boolean('status1')->default(0); // aktif/tidak
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
        Schema::dropIfExists('cms_sambutans');
    }
};
