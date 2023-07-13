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
        Schema::create('school_achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191);
            $table->string('slug');
            $table->string('short_desc');
            $table->text('content');
            $table->string('thumbnail');
            $table->enum('status', ['Publish', 'Draft', 'Delete'])->default('Draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_achievements');
    }
};
