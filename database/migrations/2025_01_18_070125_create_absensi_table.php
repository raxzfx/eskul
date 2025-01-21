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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('id_absen');
            $table->foreignId('nama_murid')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreignId('nama_eskul')->references('id_eskul')->on('eskul')->onDelete('cascade');
            $table->date('tanggal_absen');
            $table->enum('status_absen', ['hadir', 'tidak_hadir', 'izin'])->default('tidak_hadir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
