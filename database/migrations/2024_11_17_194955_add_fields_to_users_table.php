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
            $table->string('phone')->nullable()->after('email'); // Add phone number
            $table->string('address')->nullable()->after('phone'); // Add address
            $table->string('country')->nullable()->after('address'); // Add country
            $table->date('dob')->nullable()->after('country'); // Add date of birth
            $table->boolean('is_active')->default(true)->after('dob'); // Add is_active field
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'address', 'country', 'dob', 'is_active']); // Remove the fields
        });
    }
};
