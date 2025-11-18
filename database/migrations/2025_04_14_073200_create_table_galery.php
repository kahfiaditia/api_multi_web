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
        Schema::create('cms_galery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_web')->nullable();
            $table->foreign('id_web')->references('id')->on('cms_profils');
            $table->string('judul_galery', 80);
            $table->text('keterangan')->nullable();
            $table->string('path_foto_1', 80)->nullable();
            $table->string('path_foto_2', 80)->nullable();
            $table->string('path_foto_3', 80)->nullable();
            $table->string('path_foto_4', 80)->nullable();
            $table->string('path_foto_5', 80)->nullable();
            $table->string('path_foto_6', 80)->nullable();
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
        Schema::dropIfExists('cms_galery');
    }
};
