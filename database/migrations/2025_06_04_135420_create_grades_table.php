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
        Schema::create('grades', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('enrollment_id')->nullable()->index('enrollment_id');
            $table->float('midterm_score', null, 0)->nullable();
            $table->float('final_score', null, 0)->nullable();
            $table->float('other_score', null, 0)->nullable();
            $table->float('total_score', null, 0)->nullable();
            $table->string('grade_char', 2)->nullable();
            $table->enum('status', ['passed', 'failed'])->nullable()->default('failed');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grades');
    }
};
