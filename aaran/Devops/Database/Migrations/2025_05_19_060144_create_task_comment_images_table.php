<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('task_comment_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_comment_id')->references('id')->on('task_comments')->cascadeOnDelete();
            $table->text('image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_comment_images');
    }
};
