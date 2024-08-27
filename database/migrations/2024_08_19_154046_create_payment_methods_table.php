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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement(); // Menggunakan unsignedInteger untuk ID
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement(); // Menggunakan unsignedInteger untuk ID
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
        Schema::dropIfExists('payment_statuses');
    }
};
