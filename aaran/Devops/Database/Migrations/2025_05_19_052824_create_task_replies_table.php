<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('task_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_comment_id')->references('id')->on('task_comments')->cascadeOnDelete();
            $table->foreignId('task_id')->references('id')->on('tasks')->cascadeOnDelete();
            $table->text('body')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_replies');
    }
};
