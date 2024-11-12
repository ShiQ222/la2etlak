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
        $table->boolean('is_subscribed')->default(false); // true if user is subscribed, false otherwise
        $table->date('subscription_date')->nullable();     // date the user subscribed
        $table->date('expiry_date')->nullable();           // subscription expiration date
        $table->string('role')->default('user');           // role of the user (user, moderator, admin)
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['is_subscribed', 'subscription_date', 'expiry_date', 'role']);
    });
}

};
