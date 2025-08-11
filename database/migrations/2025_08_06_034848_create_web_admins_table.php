<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('web_admins', function (Blueprint $table) {
            $table->id();  // webadmin_id (PRIMARY KEY)

            // Личные данные администратора
            $table->string(column: 'full_name');
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();

            // Регистрация / Логин администратора
            $table->string('username')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            // Служебная информация
            $table->timestamp('last_login_at')->nullable();   // Последний вход
            $table->ipAddress('last_login_ip')->nullable();   // IP последнего входа

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_admins');
    }
};
