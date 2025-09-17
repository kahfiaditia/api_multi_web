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
        Schema::create('cms_tagline', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 25)->nullable();
            $table->string('deskripsi', 50)->nullable();
            $table->string('path_gambar', 95)->nullable();
            $table->string('icon', 20)->nullable();
            $table->string('status', 15)->nullable();
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
        Schema::dropIfExists('cms_tagline');
    }
};
