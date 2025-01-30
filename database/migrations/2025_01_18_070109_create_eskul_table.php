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
        Schema::create('eskul', function (Blueprint $table) {
            $table->id('id_eskul');
            $table->string('nama_eskul');
            $table->string('kode_eskul');
            $table->text('deskripsi');
            $table->foreignId('guru_eskul')->references('id_user')->on('users')->onDelete('cascade');
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->text('tempat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eskul');
    }
};
