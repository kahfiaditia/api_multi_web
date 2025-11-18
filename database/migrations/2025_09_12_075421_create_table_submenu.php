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
        Schema::create('cms_submenu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')->references('id')->on('cms_menus');
            $table->unsignedBigInteger('id_web')->nullable();
            $table->foreign('id_web')->references('id')->on('cms_profils');
            $table->string('submenu', 20)->nullable();
            $table->string('route_menu', 30)->nullable();
            $table->string('typemenu', 20)->nullable();
            $table->string('path_submenu_gambar', 95)->nullable();
            $table->text('icon', 25)->nullable();
            $table->string('status', 15)->nullable();
            $table->string('order_menu', 15)->nullable();
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
        Schema::dropIfExists('cms_submenu');
    }
};
