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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('student_id')->nullable()->index('student_id');
            $table->bigInteger('class_section_id')->nullable()->index('class_section_id');
            $table->timestamp('enrolled_at')->nullable()->useCurrent();
            $table->timestamp('registered_at')->nullable()->useCurrent();
            $table->integer('attempt_number')->nullable()->default(1);
            $table->decimal('tuition_fee', 10)->nullable();
            $table->boolean('is_retake')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
