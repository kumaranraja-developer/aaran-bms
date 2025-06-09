<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('b_name'); // Business Name
            $table->string('t_name')->unique(); // Tenant Name
            $table->string('email')->unique();
            $table->string('contact')->nullable();
            $table->string('phone')->nullable();
            // Database Details
            $table->string('db_name')->unique();
            $table->string('db_host')->default('127.0.0.1');
            $table->string('db_port')->default('3306');
            $table->string('db_user');
            $table->text('db_pass');
            $table->string('software_id')->nullable();
            $table->string('remarks')->nullable();
            $table->string('migration_status')->default('pending')->nullable();
            $table->boolean('active_id')->default(true);
            $table->softDeletes();
            $table->timestamps();

            // Indexes
            $table->index('t_name');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};



