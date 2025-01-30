<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('per_lunak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fakultas_id')->constrained('fakultas')->onDelete('cascade');
            $table->foreignId('lab_id')->constrained('labs')->onDelete('cascade');
            $table->string('nama');
            $table->string('versi');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('per_lunak');
    }
};
