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
        Schema::create('about_schools', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191);
            $table->text('content');
            $table->text('short_desc');
            $table->string('thumbnail');
            $table->enum('language', ['Indonesia', 'English', 'Jawa']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_schools');
    }
};
