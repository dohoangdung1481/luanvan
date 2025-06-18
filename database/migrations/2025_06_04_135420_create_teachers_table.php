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
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('user_id')->nullable()->index('user_id');
            $table->string('teacher_code', 20)->unique('teacher_code');
            $table->string('full_name', 100);
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('dob')->nullable();
            $table->bigInteger('department_id')->nullable()->index('department_id');
            $table->string('academic_rank', 50)->nullable();
            $table->string('degree', 50)->nullable();
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
