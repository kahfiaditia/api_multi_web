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
        Schema::table('desa_profils', function (Blueprint $table) {
            $table->string('kepala_desa', 35)->after('id')->nullable();
            $table->integer('jumlah_warga')->after('jumlah_rw')->nullable();
            $table->integer('jumlah_rumah')->after('jumlah_rw')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('desa_profils', function (Blueprint $table) {
            $table->dropColumn(['kepala_desa', 'jumlah_rumah', 'jumlah_warga']);
        });
    }
};
