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
        Schema::table('users', function (Blueprint $table) {
            // Add fields for phone login and OTP verification
            $table->string('phone')->nullable()->unique();  // Phone number should be unique
            $table->boolean('is_phone_verified')->default(false); // Status of phone verification
            $table->string('otp')->nullable();  // Store OTP (optional)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
             // Drop the new columns if rolling back the migration
             $table->dropColumn('phone');
             $table->dropColumn('is_phone_verified');
             $table->dropColumn('otp');
        });
    }
};
