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
        Schema::create('pictures', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('picturePath');
            $table->foreignId('hero_id')->nullable();
            $table->foreignId('bedroom_id')->nullable();
            $table->foreignId('bedroomtype_id')->nullable();
            $table->foreignId('news_id')->nullable();
            $table->foreignId('services_id')->nullable();
            $table->foreignId('about_id')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures');
    }
};
