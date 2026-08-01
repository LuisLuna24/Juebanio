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
        Schema::create('model_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_model_id')->constrained('product_models')->cascadeOnDelete();
            $table->string('name'); // Ej: Navy Blue
            $table->string('hex_code', 7)->nullable(); // Ej: #000080
            $table->string('swatch_image')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_colors');
    }
};
