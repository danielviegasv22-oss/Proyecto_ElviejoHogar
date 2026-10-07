<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('cliente_nombre');
            $table->string('cliente_email')->nullable();
            $table->string('ciudad_entrega');
            $table->string('direccion_entrega');
            $table->string('metodo_pago'); // efectivo / transferencia
            $table->string('billetera')->nullable();
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('costo_envio', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            $table->enum('estado', ['En preparación', 'En camino', 'Entregado'])->default('En preparación');
            $table->json('items'); // JSON con los platillos del pedido
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
