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
        Schema::table('enrollments', function (Blueprint $table) {
            $table->foreign(['student_id'], 'enrollments_ibfk_1')->references(['id'])->on('students')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['class_section_id'], 'enrollments_ibfk_2')->references(['id'])->on('class_sections')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropForeign('enrollments_ibfk_1');
            $table->dropForeign('enrollments_ibfk_2');
        });
    }
};
