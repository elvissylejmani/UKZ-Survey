<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Groups_ID');
            $table->unsignedBigInteger('User_ID');
            
            $table->unique(['Groups_ID','User_ID']);

            $table->foreign('Groups_ID')->references('id')->on('groups')->onDelete('cascade');
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
        Schema::dropIfExists('groups_user');
    }
}
