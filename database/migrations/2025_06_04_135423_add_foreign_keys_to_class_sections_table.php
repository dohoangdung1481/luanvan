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
        Schema::table('class_sections', function (Blueprint $table) {
            $table->foreign(['course_id'], 'class_sections_ibfk_1')->references(['id'])->on('courses')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['teacher_id'], 'class_sections_ibfk_2')->references(['id'])->on('teachers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['academic_year_id'], 'class_sections_ibfk_3')->references(['id'])->on('academic_years')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('class_sections', function (Blueprint $table) {
            $table->dropForeign('class_sections_ibfk_1');
            $table->dropForeign('class_sections_ibfk_2');
            $table->dropForeign('class_sections_ibfk_3');
        });
    }
};
