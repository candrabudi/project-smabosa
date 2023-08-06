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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('teacher_name');
            $table->string('teacher_subjects');
            $table->text('description');
            $table->enum('type_teacher', ['tetap','tatausaha', 'karyawan'])->default('tetap');
            $table->string('teacher_photo');
            $table->enum('language', ['Indonesia', 'English', 'Jawa']);
            $table->enum('status', ['Publish', 'Draft', 'Delete'])->default('Publish');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
