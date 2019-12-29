<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasseUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::create('classe_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Classe_ID');
            $table->unsignedBigInteger('User_ID');
            
            $table->unique(['Classe_ID','User_ID']);

            $table->foreign('Classe_ID')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('User_ID')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('classe_user');
    }
}
