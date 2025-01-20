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
        Schema::create('strongest', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('background_color_1');
            $table->string('background_opacity_1');
            $table->string('background_color_2');
            $table->string('background_opacity_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('strongest');
    }
};
