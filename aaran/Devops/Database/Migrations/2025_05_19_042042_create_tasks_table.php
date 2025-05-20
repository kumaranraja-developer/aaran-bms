<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->references('id')->on('jobs')->cascadeOnDelete();
            $table->string('title');
            $table->text('body')->nullable();
            $table->date('start_at')->nullable();
            $table->date('due_date')->nullable();
            $table->foreignId('module_id')->nullable();
            $table->foreignId('allocated_id')->nullable();
            $table->foreignId('reporter_id')->nullable();
            $table->smallInteger('priority_id')->nullable();
            $table->smallInteger('status_id')->nullable();
            $table->tinyInteger('active_id')->nullable();
            $table->string('flag')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
