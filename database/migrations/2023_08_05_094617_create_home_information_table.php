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
        Schema::create('home_information', function (Blueprint $table) {
            $table->id();
            $table->string('info_name');
            $table->string('info_image');
            $table->enum('info_lang', ['Indonesia', 'English', 'Jawa']);
            $table->enum('info_status', ['Publish', 'Draft', 'Delete'])->default('Draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_information');
    }
};
