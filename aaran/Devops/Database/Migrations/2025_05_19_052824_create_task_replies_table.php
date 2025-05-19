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
            $table->string('title');
            $table->text('commend');
            $table->string('job_id');
            $table->string('commend_id');
            $table->string('reply_id');
            $table->tinyInteger('active_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_replies');
    }
};
