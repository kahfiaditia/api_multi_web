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
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 40)->nullable();
            $table->string('logo', 64)->nullable();
            $table->string('alamat', 45)->nullable();
            $table->string('email', 40)->nullable();
            $table->text('telepon', 20)->nullable();
            $table->string('masa_pinjam', 2)->nullable();
            $table->double('denda_perhari')->nullable();
            $table->double('denda_maksimal')->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('dibuat_oleh')->nullable();
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
        Schema::dropIfExists('setting');
    }
};
