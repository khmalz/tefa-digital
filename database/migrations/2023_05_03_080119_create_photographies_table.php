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
        Schema::create('photographies', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique();
            $table->foreignId('photography_category_id')->constrained('photography_categories')->onDelete('cascade');
            $table->string('name_customer');
            $table->string('number_customer');
            $table->string('email_customer');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photographies');
    }
};