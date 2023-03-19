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
            $table->id();
            $table->string('barcode')->nullable();
            $table->string('name')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->default(NULL);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
