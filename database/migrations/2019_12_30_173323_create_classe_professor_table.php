<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasseProfessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_professor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Classe_ID');
            $table->unsignedBigInteger('Professor_ID');
            $table->unique(['Classe_ID','Professor_ID']);

            $table->foreign('Classe_ID')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('Professor_ID')->references('id')->on('professors')->onDelete('cascade');
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
        Schema::dropIfExists('classe_professor');
    }
}
