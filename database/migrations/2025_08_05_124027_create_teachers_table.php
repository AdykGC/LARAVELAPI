<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id(); // teacher_id (PRIMARY KEY)

            // Личные данные преподавателя
            $table->string(column: 'full_name');
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('avatar')->nullable();

            // Внешние ключи
            $table->foreignId('faculty_id')->nullable();
            $table->foreignId('major_id')->nullable();
            $table->timestamps();

            // Логин преподавателя
            $table->string('teac_email')->unique();
            $table->string('password');

            // Служебная информация
            $table->timestamp('last_login_at')->nullable();
            $table->ipAddress('last_login_ip')->nullable();

            // Индексы для ускорения поиска
            $table->index('full_name');
            $table->index('teac_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
