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
        Schema::create('students', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('user_id')->nullable()->index('user_id');
            $table->string('student_code', 20)->unique('student_code');
            $table->string('full_name', 100);
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('dob')->nullable();
            $table->bigInteger('department_id')->nullable()->index('department_id');
            $table->bigInteger('major_id')->nullable()->index('major_id');
            $table->string('class_name', 20)->nullable();
            $table->year('enrollment_year')->nullable();
            $table->enum('academic_status', ['normal', 'weak'])->nullable()->default('normal')->comment('Trạng thái học lực: normal - bình thường, weak - yếu');
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
