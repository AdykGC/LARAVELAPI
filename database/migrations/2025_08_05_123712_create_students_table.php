<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // student_id (PRIMARY KEY)

            // Личные данные студента
            $table->string(column: 'full_name');
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('avatar')->nullable();

            // Учебная информация
            $table->enum('status', ['active', 'inactive', 'suspended', 'graduated'])->default('active');
            $table->decimal('gpa', 3, 2)->nullable();
            $table->integer(column: 'credits')->nullable();

            // Внешние ключи
            $table->foreignId('faculty_id')->nullable();
            $table->foreignId('major_id')->nullable();
            $table->timestamps();

            // Логин студента
            $table->string('stud_email')->unique();
            $table->string('password');

            // Служебная информация
            $table->timestamp('last_login_at')->nullable();
            $table->ipAddress('last_login_ip')->nullable();

            // Индексы для ускорения поиска
            $table->index('full_name');
            $table->index('stud_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('students');
    }
};
