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
        Schema::create('cms_teams', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 60);
            $table->string('nip', 50)->nullable();
            $table->string('jabatan', 80);
            $table->string('email', 50)->nullable();
            $table->string('telepon', 20)->nullable();
            $table->string('keterangan', 30)->nullable();
            $table->text('area')->nullable();
            $table->string('path_foto', 95)->nullable();
            $table->string('status', 1)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_teams');
    }
};
