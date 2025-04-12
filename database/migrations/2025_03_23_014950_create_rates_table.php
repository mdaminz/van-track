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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->string('school_id')->nullable();
            $table->string('district')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('van_id')->nullable();

            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
