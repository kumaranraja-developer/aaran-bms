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
            $table->date('start_time')->nullable();
            $table->date('due_time')->nullable();
            $table->foreignId('assigned')->nullable();
            $table->smallInteger('priority')->nullable();
            $table->string('status')->nullable();
            $table->smallInteger('status_id')->nullable();
            $table->tinyInteger('active_id')->default('1')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
