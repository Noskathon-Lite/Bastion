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
        Schema::create('kyc_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Establish a relationship with users
            $table->string('document_type'); // e.g., "passport", "driver_license"
            $table->string('document_name'); // Original file name
            $table->string('file_path'); // Path where the file is stored
            $table->string('status')->default('pending'); // "pending", "verified", "rejected"
            $table->text('admin_notes')->nullable(); // Notes from the admin
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kyc_documents');
    }
};
