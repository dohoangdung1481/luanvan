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
        Schema::create('academic_years', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('year', 9)->nullable()->comment('e.g. 2024-2025');
            $table->enum('semester', ['HK1', 'HK2', 'HK3', 'HE'])->comment('HK1: Học kỳ 1, HK2: Học kỳ 2, HK3: học kỳ phụ, HE: hè');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_years');
    }
};
