<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('vname');
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('alter_mobile_number')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('residential_address')->nullable();
            $table->foreignId('city_id')->nullable();
            $table->foreignId('state_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('pincode_id')->nullable();
            $table->string('professional_details')->nullable();
            $table->string('highest_qualification')->nullable();
            $table->string('occupation')->nullable();
            $table->string('company_name')->nullable();
            $table->string('industry_type')->nullable();
            $table->string('experience')->nullable();
            $table->tinyInteger('active_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
