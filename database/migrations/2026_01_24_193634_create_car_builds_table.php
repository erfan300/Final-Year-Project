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
        Schema::create('car_builds', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Aston Formula Student');
            $table->unsignedSmallInteger('year');
            $table->string('image_path')->nullable();
            $table->unsignedSmallInteger('top_speed');
            $table->unsignedSmallInteger('weight');
            $table->unsignedSmallInteger('power');
            $table->string('engine');
            $table->string('chassis');
            $table->text('highlights')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_builds');
    }
};
