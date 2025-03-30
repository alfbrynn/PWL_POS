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
        Schema::create('m_suplier', function (Blueprint $table) {
            $table->id('suplier_id');
            $table->string('nama_suplier', 100);
            $table->text('alamat_suplier');
            $table->string('kontak_suplier', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_suplier');
    }
};
