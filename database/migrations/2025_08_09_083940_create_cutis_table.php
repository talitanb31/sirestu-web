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
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->constrained('pegawais')->onDelete('cascade');
            $table->integer('cuti_n')->default(0);
            $table->integer('cuti_1n')->default(0);
            $table->integer('cuti_2n')->default(0);
            $table->integer('cuti_besar')->default(0);
            $table->integer('cuti_sakit')->default(0);
            $table->integer('cuti_melahirkan')->default(0);
            $table->integer('cuti_alasan_penting')->default(0);
            $table->integer('cuti_diluat_negara')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cutis');
    }
};
