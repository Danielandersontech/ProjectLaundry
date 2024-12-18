<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id('id_package');
            $table->string('nama_paket', 100);
            $table->text('deskripsi')->nullable();
            $table->integer('durasi');
            $table->decimal('harga_per_kg', 10, 2);
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
