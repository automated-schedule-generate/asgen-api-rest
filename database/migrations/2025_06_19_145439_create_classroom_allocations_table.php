<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classroom_allocations', function (Blueprint $table) {
            $table->foreignId('classroom_id')
                ->constrained('classrooms')
                ->onDelete('cascade');
            $table->foreignId('timetable_allocation_id')
                ->constrained('timetable_allocations')
                ->onDelete('cascade');
            $table->timestamps();
            $table->primary(['classroom_id', 'timetable_allocation_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classroom_allocations');
    }
};
