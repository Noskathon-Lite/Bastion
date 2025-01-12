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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained('vehicleCategory')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->decimal('base_price', 10, 2);
            $table->decimal('daily_rate', 10, 2);
            $table->decimal('fuel_capacity', 8, 2);
            $table->boolean('gps_enabled')->default(false);
            $table->enum('gps_type', ['mobile', 'vehicle'])->nullable();
            $table->enum('status', ['available', 'rented', 'maintenance', 'suspended'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
