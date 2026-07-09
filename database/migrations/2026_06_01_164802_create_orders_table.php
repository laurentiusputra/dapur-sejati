<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); 
            $table->string('invoice_number')->unique();
            $table->string('customer_name');
            $table->string('customer_whatsapp_number');
            $table->text('shipping_address');
            $table->decimal('total_price', 12, 2);
            $table->integer('unique_code');
            $table->enum('status', ['pending', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};