<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('design_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('design_category_id')->constrained('design_categories')->onDelete('cascade');
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
        Schema::dropIfExists('design_plans');
    }
};