<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIsCompletedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('is_completeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Survey_ID');
            $table->unsignedBigInteger('User_ID');
            $table
            ->foreign('Survey_ID')
            ->references('id')
            ->on('surveys')
            ->onDelete('cascade');
            $table
            ->foreign('User_ID')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('is_completeds');
    }
}
