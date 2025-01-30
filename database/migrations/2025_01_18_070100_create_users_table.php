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
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->integer('nis_nig');
            $table->string('password');
            $table->string('nama_lengkap');
            $table->foreignId('nama_jurusan')->references('id_jurusan')->on('jurusan')->onDelete('cascade');
            $table->integer('nomor_telepon');
            $table->string('tingkat_kelas');
            $table->enum('role', ['admin', 'siswa','kesiswaan','pembinaEskul'])->default('siswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
