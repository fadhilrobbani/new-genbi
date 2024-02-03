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
        Schema::create('absensi_kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('kegiatan_id');
            $table->unsignedInteger('jabatan_id');
            $table->unsignedInteger('level_id');
            $table->string('foto');
            $table->string('deskripsi');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans');
            $table->foreign('jabatan_id')->references('id')->on('jabatan_kegiatans');
            $table->foreign('level_id')->references('id')->on('level_kegiatans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_kegiatans');
    }
};
