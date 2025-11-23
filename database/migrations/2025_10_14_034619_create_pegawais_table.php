<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

     public function up(): void
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nip',20);
            $table->string('nama',100);
            $table->text('alamat');
            $table->string('telp',15);
            $table->enum('jk',['L','P']);
            $table->string('username',30);
            $table->string('password',100);
            $table->string('foto')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('jabatan_id')->constrained('jabatans')->onDelete('cascade');
            $table->foreignId('unitkerja_id')->constrained('unitkerjas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
