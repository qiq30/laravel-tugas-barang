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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang', 100);
            $table->string('kategori', 50);
            $table->integer('stok');
            $table->integer('harga_modal');
            $table->integer('harga_jual');
            $table->integer('barang_terjual');
            $table->integer('total_pendapatan')->default(0);
            $table->integer('total_laba')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
