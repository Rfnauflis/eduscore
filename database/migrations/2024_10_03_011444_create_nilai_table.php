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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_siswa")->index();
            $table->unsignedBigInteger("id_ekstra")->index();       
            $table->integer("nilai");        
            $table->text("catatan");        
            $table->date("tgl_penilaian");        
            $table->foreign('id_siswa')->references("id")->on("siswa");
            $table->foreign('id_ekstra')->references("id")->on("ekstra");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
