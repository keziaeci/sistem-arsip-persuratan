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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->dateTime('tanggal');
            $table->string('nomor_surat')->unique();
            $table->string('asal_surat')->nullable();
            $table->string('kepada')->nullable();
            $table->string('keperluan')->nullable();
            $table->string('nomor_tanggal_surat',100)->nullable();
            $table->string('perihal' , 100)->nullable();
            $table->string('file');
            $table->string('disposisi')->nullable();
            $table->string('laporan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
