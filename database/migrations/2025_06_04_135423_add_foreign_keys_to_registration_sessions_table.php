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
        Schema::table('registration_sessions', function (Blueprint $table) {
            $table->foreign(['academic_year_id'], 'registration_sessions_ibfk_1')->references(['id'])->on('academic_years')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registration_sessions', function (Blueprint $table) {
            $table->dropForeign('registration_sessions_ibfk_1');
        });
    }
};
