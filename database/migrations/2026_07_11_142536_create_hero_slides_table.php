<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_slides', function (Blueprint $table) {
            $table->id();
            $table->string('badge')->nullable();       // Contoh: "🌶️ OPEN PO WEEKLY..."
            $table->string('title');                  // Contoh: "Kehangatan Rasa..."
            $table->text('description');              // Contoh: "Hidangan pre-order pilihan..."
            $table->string('image_path');             // Untuk menyimpan link foto banner ke Supabase S3
            $table->string('button_text')->default('Order Now');
            $table->string('button_url')->default('#menu');
            $table->integer('sort_order')->default(0); // Supaya slide bisa diurutkan manual
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_slides');
    }
};