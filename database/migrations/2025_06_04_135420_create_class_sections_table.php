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
        Schema::create('class_sections', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('course_id')->nullable()->index('course_id');
            $table->bigInteger('teacher_id')->nullable()->index('teacher_id');
            $table->bigInteger('academic_year_id')->nullable()->index('academic_year_id');
            $table->string('room', 50)->nullable();
            $table->integer('max_students')->nullable();
            $table->string('group_code', 20)->nullable();
            $table->string('section_code', 20)->nullable();
            $table->text('schedule')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_sections');
    }
};
