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
        Schema::create('about_description', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('about_section_id');
            $table->string('titleEn');
            $table->string('titleFr');
            $table->longText('descriptionEn')->nullable();
            $table->longText('descriptionFr')->nullable();
            $table->longText('background_color')->nullable();
            $table->longText('background_opacity')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_description');
    }
};
