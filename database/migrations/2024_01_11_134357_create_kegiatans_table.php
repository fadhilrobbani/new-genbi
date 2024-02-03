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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('level_id'); // Change to unsigned integer
            $table->string('judul_kegiatan');
            $table->string('deskripsi_kegiatan');
            $table->string('note_kegiatan');
            $table->date('tgl_pendaftaran');
            $table->date('tgl_kegiatan');
            $table->timestamps();

            $table->foreign('level_id')->references('id')->on('level_kegiatans');
        });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
