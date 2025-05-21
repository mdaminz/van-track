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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('postcode')->nullable();
            $table->string('district')->nullable();
            $table->string('school_id')->nullable();
            $table->string('profile_photo')->default('no-profile.png');
            $table->string('rfid_tag')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('relationship')->nullable();
            $table->string('status')->nullable();

            $table->string('user_id')->nullable();
            $table->string('rate_id')->nullable();
            
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('rate_id')->references('id')->on('rates')->onDelete('cascade');
            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
