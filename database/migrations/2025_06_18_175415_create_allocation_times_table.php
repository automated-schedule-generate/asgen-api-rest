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
        Schema::create('allocation_times', function (Blueprint $table) {
            $table->id();
            $table->enum('slot_time', [0, 1, 2, 3, 4, 5]);
            $table->foreignId('timetable_allocation_id')
                ->constrained('timetable_allocations')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allocation_times');
    }
};
