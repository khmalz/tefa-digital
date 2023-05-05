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
        Schema::create('designs', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique();
            $table->foreignId('design_category_id')->constrained('design_categories')->onDelete('cascade');
            $table->string('name_customer');
            $table->string('number_customer');
            $table->string('email_customer');
            $table->string('slogan')->nullable();
            $table->string('color');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designs');
    }
};