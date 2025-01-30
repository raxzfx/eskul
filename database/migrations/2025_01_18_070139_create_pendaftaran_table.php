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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id('id_pendaftaran');
            $table->string('hoby');
            $table->text('alasan');
            $table->foreignId('nama_murid')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreignId('nama_eskul')->references('id_eskul')->on('eskul')->onDelete('cascade');
            $table->foreignId('nis_nigUser')->references('id_user')->on('users')->onDelete('cascade');
            $table->enum('status', ['approve', 'reject', 'pending'])->default('pending');
            $table->date('tgl_daftar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
