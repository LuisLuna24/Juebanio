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
        Schema::create('component_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_variant_id')->constrained('model_variants')->cascadeOnDelete();
            $table->foreignId('component_id')->constrained('components')->cascadeOnDelete();
            $table->unsignedTinyInteger('quantity')->default(1);
            $table->string('dimensions')->nullable(); // Ej: "50x80 cm"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('component_variants');
    }
};
