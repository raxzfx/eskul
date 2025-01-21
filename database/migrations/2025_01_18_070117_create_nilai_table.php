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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->foreignId('nama_murid')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreignId('nama_eskul')->references('id_eskul')->on('eskul')->onDelete('cascade');
            $table->foreignId('nama_jurusan')->references('id_jurusan')->on('jurusan')->onDelete('cascade');
            $table->decimal('nilai', 5, 2);
            $table->string('keterangan');
            $table->date('tgl_penilaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
