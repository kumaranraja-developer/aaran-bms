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
        Schema::create('client_register', function (Blueprint $table) {
            $table->id();
            $table->string('vname');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('trial')->default(false);
            $table->string('plan');
            $table->string('payment_status')->default('pending');
            $table->string('payment_id')->nullable();
            $table->tinyInteger('active_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_register');
    }
};
