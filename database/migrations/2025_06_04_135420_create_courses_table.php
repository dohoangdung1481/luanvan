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
            $table->bigInteger('id', true);
            $table->string('course_code', 20)->unique('course_code');
            $table->string('name', 100);
            $table->integer('credit');
            $table->integer('theory_hours')->nullable();
            $table->integer('practice_hours')->nullable();
            $table->bigInteger('major_id')->nullable()->index('major_id');
            $table->integer('semester_number')->nullable();
            $table->decimal('base_fee', 10)->nullable()->default(1000000);
            $table->integer('max_attempts')->nullable()->default(3);
            $table->enum('credit_type', ['theory', 'practice', 'internship', 'project', 'graduation'])->nullable()->default('theory')->comment('Loại tín chỉ');
            $table->timestamp('created_at')->nullable()->useCurrent();
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
