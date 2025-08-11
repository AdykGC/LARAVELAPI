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
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); // course_id (PRIMARY KEY)

            // Учебная информация
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('credits')->default(1);
            $table->enum('status', ['active', 'inactive'])->default('active');

            // Служебная информация
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
