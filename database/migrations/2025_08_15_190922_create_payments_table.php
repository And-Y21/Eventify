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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('registration_id')->constrained('registrations')->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->enum('payment_method', ['tarjeta', 'efectivo', 'transferencia']);
            $table->enum('status', ['pendiente', 'completado', 'fallido', 'reembolsado'])->default('pendiente');
            $table->date('payment_date');
            $table->string('transaction_reference')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
