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
        Schema::create('course_attempts', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('student_id')->nullable()->index('student_id');
            $table->bigInteger('course_id')->nullable()->index('course_id');
            $table->integer('attempt_number')->nullable();
            $table->bigInteger('academic_year_id')->nullable()->index('academic_year_id');
            $table->bigInteger('class_section_id')->nullable()->index('class_section_id');
            $table->enum('result', ['passed', 'failed']);
            $table->decimal('tuition_fee', 10)->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_attempts');
    }
};
