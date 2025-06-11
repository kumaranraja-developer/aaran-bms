<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
            Schema::create('task_activities', function (Blueprint $table) {
                $table->id();
                $table->tinyInteger('flag')->nullable();
                $table->foreignId('task_id')->references('id')->on('tasks');
                $table->longText('content')->nullable();
                $table->foreignId('user_id')->nullable();
                $table->tinyInteger('active_id')->nullable();
                $table->timestamps();
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_activities');
    }
};
