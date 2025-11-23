<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('unitkerjas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama',100);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unitkerjas');
    }
};
