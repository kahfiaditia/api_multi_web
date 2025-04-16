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
       
            Schema::create('desa_sosials', function (Blueprint $table) {
                $table->id();
                $table->string('nama_media', 60);
                $table->text('link')->nullable();
                $table->string('keterangan', 80)->nullable();
                $table->string('logo_media')->nullable();
                $table->string('status', 1)->nullable();
                $table->unsignedBigInteger('dibuat_oleh');
                $table->foreign('dibuat_oleh')->references('id')->on('users');
                $table->timestamps();
                $table->softDeletes();
            });
    }
        
    
        
        public function down(): void
        {
            Schema::dropIfExists('desa_sosials');
        }
};
