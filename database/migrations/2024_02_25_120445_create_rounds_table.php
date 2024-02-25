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
        Schema::create('rounds', function (Blueprint $table) {
            $table->string('contest_name');
            $table->year('contest_year');
            $table->integer('number');
            $table->timestamps(); // (?)

            $table->foreign(['contest_name', 'contest_year'], 'contest_id')
            ->references(['name', 'year'])->on('contests');
            $table->primary(['contest_name', 'contest_year', 'number'], 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rounds', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign('contest_id');
        }); // (?)

        Schema::dropIfExists('rounds');
    }
};
