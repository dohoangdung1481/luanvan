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
        Schema::create('teaching_assignments', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('teacher_id')->nullable()->index('teacher_id');
            $table->bigInteger('course_id')->nullable()->index('course_id');
            $table->bigInteger('academic_year_id')->nullable()->index('academic_year_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_assignments');
    }
};
