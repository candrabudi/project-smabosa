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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author_id');
            $table->dateTime('post_date');
            $table->string('post_title');
            $table->text('post_short_desc');
            $table->text('post_content');
            $table->enum('post_status', ['Publish', 'Draft', 'Delete'])->default('Draft');
            $table->string('post_slug');
            $table->string('post_thumbnail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
