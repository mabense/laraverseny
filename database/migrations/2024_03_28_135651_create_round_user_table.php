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
        Schema::create('round_user', function (Blueprint $table) {
            $table->string('contest_name');
            $table->year('contest_year');
            $table->integer('round_number');
            $table->string('user_email')->unique();
            $table->timestamps();

            $table->foreign(['contest_name', 'contest_year', 'round_number'], 'round_id')
            ->references(['contest_name', 'contest_year', 'number'])->on('rounds');
            $table->foreign('user_email', 'user_id')->references('email')->on('users');
            $table->primary(['contest_name', 'contest_year', 'round_number', 'user_email'], 'id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('round_user', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign('round_id');
            $table->dropForeign('user_id');
        }); // (?)

        Schema::dropIfExists('round_user');
    }
};
