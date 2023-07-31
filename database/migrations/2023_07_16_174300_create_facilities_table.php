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
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191);
            $table->string('slug');
            $table->text('short_desc');
            $table->text('content');
            $table->string('thumbnail');
            $table->enum('language', ['Indonesia', 'English', 'Jawa']);
            $table->enum('status', ['Publish', 'Draft', 'Delete'])->default('Draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};
