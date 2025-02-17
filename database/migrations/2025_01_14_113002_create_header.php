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
        Schema::create('header', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('backgroundColor');
            $table->string('logo');
            $table->string('icone');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('header');
    }
};
