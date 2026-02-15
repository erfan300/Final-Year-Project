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
            $table->string('name');
            $table->unsignedSmallInteger('year'); // Small integer for storage efficiency
            $table->string('image_path')->nullable();
            $table->unsignedSmallInteger('top_speed'); // Unsigned numeric values (no negative values)
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
