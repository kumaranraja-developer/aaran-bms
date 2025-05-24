<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dev_teams', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('vname');
            $table->string('designation')->nullable();
            $table->string('role')->nullable();
            $table->text('photo')->nullable();
            $table->text('bio')->nullable();
            $table->string('mail')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fb')->nullable();
            $table->string('twitter')->nullable();
            $table->string('msg')->nullable();
            $table->tinyInteger('active_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dev_teams');
    }
};
