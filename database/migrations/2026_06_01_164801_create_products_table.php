<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price')->nullable();
            $table->text('narration');
            $table->string('image');
            $table->enum('category', ['daily', 'special', 'po']);
            $table->integer('quota')->default(0); // 🛠️ TAMBAHKAN BARIS INI BIAR CONTROLLER GAK ERROR
            $table->boolean('is_available')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};