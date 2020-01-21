<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Name');
            $table->unsignedBigInteger('Prof_ID');
            $table->unsignedBigInteger('Class_ID');
            $table->foreign('Prof_ID')
            ->references('id')
            ->on('professors');
            $table->foreign('Class_ID')
            ->references('id')
            ->on('classes');
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
        Schema::dropIfExists('groups');
    }
}
