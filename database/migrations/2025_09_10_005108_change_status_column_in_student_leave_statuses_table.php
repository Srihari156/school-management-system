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
        Schema::table('student_leave_statuses', function (Blueprint $table) {
             $table->string('status', 255)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student_leave_statuses', function (Blueprint $table) {
            $table->enum('status', ['present', 'absent', 'leave'])->change();
        });
    }
};
