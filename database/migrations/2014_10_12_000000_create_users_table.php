<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('university_email')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('last_login_at')->nullable();
            $table->ipAddress('last_login_ip')->nullable();
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
