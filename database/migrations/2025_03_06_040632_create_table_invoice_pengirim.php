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
        Schema::create('invoice_pengirim', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengirim', 40);
            $table->string('nama_perusahaan', 40)->nullable();
            $table->string('kode_pengirim', 15)->nullable();
            $table->string('jabatan', 40)->nullable();
            $table->string('telepon', 18)->unique()->nullable();
            $table->string('email', 35)->unique()->nullable();;
            $table->text('alamat')->nullable();
            $table->string('logo_perusahaan', 64)->nullable();
            $table->string('qr_code_pengirim')->nullable();
            $table->string('status', 10)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_pengirim');
    }
};
