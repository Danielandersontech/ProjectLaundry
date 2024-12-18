<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id_payment');
            $table->foreignId('id_order')->constrained('orders', 'id_order')->onDelete('cascade'); // Pastikan ini benar
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['Pending', 'Dibayar', 'Gagal']);
            $table->string('payment_method');
            $table->dateTime('payment_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};


