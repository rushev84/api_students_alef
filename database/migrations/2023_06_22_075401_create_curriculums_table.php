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
        Schema::create('curriculums', function (Blueprint $table) {
            $table->unsignedBigInteger('student_class_id');
            $table->unsignedBigInteger('lecture_id');

            $table->primary(['student_class_id', 'lecture_id']);

            $table->foreign('student_class_id')->references('id')->on('student_classes');
            $table->foreign('lecture_id')->references('id')->on('lectures');

            $table->unsignedInteger('order');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curricula');
    }
};
