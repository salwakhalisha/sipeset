<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('meminjams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('aset_id')->constrained('asets')->onDelete('cascade');
            $table->foreignId('pegawai_id')->constrained('pegawais')->onDelete('cascade');
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak', 'dikembalikan'])->default('menunggu');
            $table->date('tanggal_pinjam');
            $table->date('batas_kembali');
            $table->date('tanggal_kembali')->nullable();
            $table->integer('hari_telat')->default(0);

            $table->string('keterangan');
            
            $table->string('foto');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meminjams');
    }
};
