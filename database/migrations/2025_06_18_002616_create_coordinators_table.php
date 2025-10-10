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
        Schema::create('coordinators', function (Blueprint $table) {
            $table->id();
            $table->timestamp('start');
            $table->timestamp('end')->nullable();
            $table->foreignId('teacher_id')
                ->references('user_id')
                ->on('teachers')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coordinators');
    }
};
