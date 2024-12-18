<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_order');
            $table->foreignId('id_pengguna');
            $table->foreignId('id_package');
            $table->decimal('berat_kg', 5, 2);
            $table->decimal('subtotal', 10, 2);
            $table->dateTime('tgl_order');
            $table->enum('status', ['Pending', 'Selesai', 'Dibatalkan']);
            $table->dateTime('waktu_pengambilan')->nullable();
            $table->dateTime('waktu_pengantaran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
