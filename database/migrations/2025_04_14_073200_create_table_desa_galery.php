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
        Schema::create('desa_galery', function (Blueprint $table) {
            $table->id();
            $table->string('judul_galery', 80);
            $table->text('keterangan')->nullable();
            $table->string('foto_1', 80)->nullable();
            $table->string('foto_2', 80)->nullable();
            $table->string('foto_3', 80)->nullable();
            $table->string('foto_4', 80)->nullable();
            $table->string('foto_5', 80)->nullable();
            $table->string('foto_6', 80)->nullable();
            $table->string('status', 1)->default(1);
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
        Schema::dropIfExists('desa_galery');
    }
};
