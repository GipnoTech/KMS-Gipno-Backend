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
        Schema::create('module_chapter_articles', function (Blueprint $table) {
            $table->id();
            $table->integer('article_id');
            $table->integer('training_section_id');
            $table->string('title');
            $table->text('content');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('module_chapter_articles');
    }
};
