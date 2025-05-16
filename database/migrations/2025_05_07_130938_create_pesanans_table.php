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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('paketwo_id');
            $table->date('tanggal_pesan');
            $table->string('status');
            $table->timestamps();

            // Relasi ke tabel user dan paketwo
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('paketwo_id')->references('id')->on('paketwo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
