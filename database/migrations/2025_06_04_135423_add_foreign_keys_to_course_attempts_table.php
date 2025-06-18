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
        Schema::table('course_attempts', function (Blueprint $table) {
            $table->foreign(['student_id'], 'course_attempts_ibfk_1')->references(['id'])->on('students')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['course_id'], 'course_attempts_ibfk_2')->references(['id'])->on('courses')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['academic_year_id'], 'course_attempts_ibfk_3')->references(['id'])->on('academic_years')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['class_section_id'], 'course_attempts_ibfk_4')->references(['id'])->on('class_sections')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_attempts', function (Blueprint $table) {
            $table->dropForeign('course_attempts_ibfk_1');
            $table->dropForeign('course_attempts_ibfk_2');
            $table->dropForeign('course_attempts_ibfk_3');
            $table->dropForeign('course_attempts_ibfk_4');
        });
    }
};
