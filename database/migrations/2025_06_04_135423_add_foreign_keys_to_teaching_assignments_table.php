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
        Schema::table('teaching_assignments', function (Blueprint $table) {
            $table->foreign(['teacher_id'], 'teaching_assignments_ibfk_1')->references(['id'])->on('teachers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['course_id'], 'teaching_assignments_ibfk_2')->references(['id'])->on('courses')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['academic_year_id'], 'teaching_assignments_ibfk_3')->references(['id'])->on('academic_years')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teaching_assignments', function (Blueprint $table) {
            $table->dropForeign('teaching_assignments_ibfk_1');
            $table->dropForeign('teaching_assignments_ibfk_2');
            $table->dropForeign('teaching_assignments_ibfk_3');
        });
    }
};
