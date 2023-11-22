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
        Schema::create('photography_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('photography_category_id')->constrained('photography_categories')->cascadeOnDelete();
            $table->string('title');
            $table->integer('price');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photography_plans');
    }
};
