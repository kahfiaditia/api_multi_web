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
        Schema::create('cms_faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_web')->nullable();
            $table->foreign('id_web')->references('id')->on('cms_profils');
            $table->string('pertanyaan', 255);
            $table->text('jawaban');
            $table->string('keterangan', 100)->nullable();
            $table->string('status', 10)->nullable();
            $table->timestamps();
            $table->softDeletes(); // untuk deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_faqs');
    }
};
