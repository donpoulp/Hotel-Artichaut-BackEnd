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
        Schema::create('icon', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->string('iconPath');
            $table->string('link');
            $table->foreignId('footer_id')->nullable();
            $table->foreignId('header_id')->nullable();
            $table->foreignId('bedroom_type_id')->nullable();
            $table->foreignId('strongest_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('icon');
    }
};
