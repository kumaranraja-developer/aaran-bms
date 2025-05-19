<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('task_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->references('id')->on('tasks')->cascadeOnDelete();
            $table->text('image')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_images');
    }
};
