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
        Schema::create('cms_profils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pt', 65)->nullable();
            $table->string('nama_web', 45)->nullable();
            $table->string('path_logo', 95)->nullable();
            $table->string('alamat_lengkap')->nullable();
            $table->string('telepon_1')->nullable();
            $table->string('telepon_2')->nullable();
            $table->string('email_1')->nullable();
            $table->string('email_2')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('status', 12)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_profils');
    }
};
