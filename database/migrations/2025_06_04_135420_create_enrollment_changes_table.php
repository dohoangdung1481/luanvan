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
        Schema::create('enrollment_changes', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('enrollment_id')->nullable()->index('enrollment_id');
            $table->enum('change_type', ['withdraw', 'cancel', 'adjust']);
            $table->text('reason')->nullable();
            $table->integer('refund_percent')->nullable()->comment('Mức hoàn học phí khi rút môn (0-100%)');
            $table->boolean('approved_by_advisor')->nullable()->default(false);
            $table->timestamp('created_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment_changes');
    }
};
