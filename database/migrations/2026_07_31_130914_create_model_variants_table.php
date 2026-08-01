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
        Schema::create('model_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_color_id')->constrained('model_colors')->cascadeOnDelete();
            $table->string('sku')->unique()->nullable();
            $table->unsignedTinyInteger('pieces_count'); // 1, 2, 3
            $table->decimal('price', 10, 2)->default(0.00);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->string('package_dimensions')->nullable();
            $table->unsignedInteger('weight_grams')->nullable();
            $table->string('main_image')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_variants');
    }
};
