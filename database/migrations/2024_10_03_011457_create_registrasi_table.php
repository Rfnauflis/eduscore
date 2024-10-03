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
        Schema::create('registrasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_ekstra")->index();
            $table->foreign('id_ekstra')->references("id")->on("ekstra")->onDelete("cascade"); 
            $table->unsignedBigInteger("id_siswa")->index();
            $table->foreign('id_siswa')->references("id")->on("siswa")->onDelete("cascade"); 
            $table->timestamp("tgl_daftar");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrasi');
    }
};
