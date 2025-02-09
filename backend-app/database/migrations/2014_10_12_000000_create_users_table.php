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
        Schema::create('users', function (Blueprint $table) {
             $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();  // Make it nullable
            $table->string('nic')->nullable();    // Make it nullable
            $table->string('address'); // Make it nullable
            $table->enum('user_type', ['customer', 'business', 'outlet_manager', 'admin'])->default('customer');
            $table->string('password');
            $table->boolean('is_verified')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
