<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('mengembalikans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('meminjam_id')->constrained('meminjams')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('kondisi', ['baik', 'rusak ringan','rusak berat', 'hilang']);
            $table->string('keterangan')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mengembalikans');
    }
};
