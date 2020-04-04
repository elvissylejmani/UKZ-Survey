<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuzzyRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuzzy_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('AverageOfAnswers');
            $table->unsignedBigInteger('StudentSet');
            $table->unsignedBigInteger('Prof_ID');
            $table->foreign('StudentSet')
            ->references('id') 
            ->on('Fuzzy_Sets')
            ->onDelete('cascade');
            $table->foreign('Prof_ID')
            ->references('id') 
            ->on('professors')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fuzzy_ratings');
    }
}
