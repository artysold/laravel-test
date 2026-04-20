<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('name');
            $table->fullText('name');
            $table->unsignedBigInteger('price'); // Цена в копейках
            $table->foreignId('category_id');
            $table->float('rating');
            $table->boolean('in_stock');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE products ADD CONSTRAINT rating_range CHECK (rating >= 0 AND rating <= 5)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
