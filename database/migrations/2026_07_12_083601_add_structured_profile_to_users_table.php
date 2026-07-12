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
        Schema::table('users', function (Blueprint $table) {
        $table->string('phone')->nullable();
        $table->string('city_district')->nullable();
        $table->text('address_line')->nullable();
        $table->string('address_detail')->nullable();
        $table->string('address_type')->nullable(); // Rumah atau Kantor
        $table->string('birth_date')->nullable();
        $table->string('gender')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
