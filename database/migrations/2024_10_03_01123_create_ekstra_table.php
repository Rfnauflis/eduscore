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
        Schema::create('ekstra', function (Blueprint $table) {
            $table->id();
            $table->string("nama_ekstra");
            $table->text("deskripsi");
            $table->string("jadwal");
            $table->unsignedBigInteger("id_pembina")->index();
            $table->foreign('id_pembina')->references("id")->on("pembina");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstra');
    }
};
