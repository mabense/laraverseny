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
        Schema::create('contests', function (Blueprint $table) {
            $table->string('name');
            $table->year('year');
            $table->integer('points_for_correct');
            $table->integer('points_for_incorrect');
            $table->integer('points_for_missing');
            $table->timestamps();

            $table->primary(['name', 'year'], 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contests');
    }
};
