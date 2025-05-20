<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
            Schema::create('activities', function (Blueprint $table) {
                $table->id();
                $table->foreignId('task_id')->references('id')->on('tasks')->onDelete('cascade');
                $table->text('vname');
                $table->string('start_on')->nullable();
                $table->string('end_on')->nullable();
                $table->foreignId('status_id')->nullable();
                $table->tinyInteger('active_id')->nullable();
                $table->foreignId('user_id')->nullable();
                $table->timestamps();
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
