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
        Schema::create('printings', function (Blueprint $table) {
            $table->id();
            $table->ulid()->unique();
            $table->string('name_customer');
            $table->string('number_customer');
            $table->string('email_customer');
            $table->string('material');
            $table->string('scale');
            $table->string('file');
            $table->text('description')->nullable();
            $table->enum('status', ['pending', 'progress', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('printings');
    }
};