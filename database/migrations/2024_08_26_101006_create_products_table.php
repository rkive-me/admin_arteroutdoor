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
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('category_id'); // Menggunakan unsignedInteger agar sesuai dengan id di categories
            $table->string('title', 50);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->string('product_code', 10);
            $table->binary('image');
            $table->string('description', 255);
            $table->timestamps();
        });

        Schema::create('stocks', function (Blueprint $table) {
            $table->unsignedInteger('id')->length(10)->autoIncrement();
            $table->unsignedInteger('product_id'); // Menggunakan unsignedInteger agar sesuai dengan id di products
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('qty', false, true)->length(5); // integer dengan panjang 5
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
        Schema::dropIfExists('products');
    }
};
