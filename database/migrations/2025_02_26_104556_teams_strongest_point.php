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
        Schema::create('teams_strongest_point', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('teams_id');
            $table->longText('textEn')->nullable();
            $table->longText('textFr')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams_strongest_point');
    }
};
