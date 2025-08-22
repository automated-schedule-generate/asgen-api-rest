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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->enum('turn', ['matutino', 'vespertino', 'noturno']);
            $table->integer('course_semester');
            $table->foreignId('course_id')
                ->nullable()
                ->constrained('courses')
                ->onDelete('set null');
            $table->foreignId('semester_id')
                ->nullable()
                ->constrained('semesters')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
