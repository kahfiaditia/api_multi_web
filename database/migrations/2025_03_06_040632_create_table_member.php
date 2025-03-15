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
        Schema::create('member', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 20)->unique()->nullable();
            $table->string('nama', 30)->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon', 18)->unique()->nullable();
            $table->string('email', 35)->unique()->nullable();
            $table->string('foto', 64)->nullable();
            $table->string('qr_code')->nullable();
            $table->string('status', 10)->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('member');
    }
};
