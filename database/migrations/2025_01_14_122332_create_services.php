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
        Schema::create('services', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->longText('description');
            $table->integer('duration');
            $table->integer('price');
            $table->integer('time');
            $table->integer('quantity');
            $table->string('background_color_1');
            $table->string('background_opacity_1');
            $table->string('backgroundText_color_1');
            $table->string('backgroundText_opacity_1');
            $table->string('backgroundText_color_2');
            $table->string('backgroundText_opacity_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
