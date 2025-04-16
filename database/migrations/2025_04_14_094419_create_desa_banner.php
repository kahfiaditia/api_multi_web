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
        Schema::create('desa_banner', function (Blueprint $table) {
            $table->id();
            $table->string('judul_banner', 80);
            $table->string('gambar_banner', 80)->nullable();
            $table->string('link', 200)->nullable();
            $table->text('keterangan', 200)->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('desa_banner');
    }
};
