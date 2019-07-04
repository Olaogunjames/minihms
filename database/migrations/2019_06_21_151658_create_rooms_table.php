<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room_number');
            $table->string('room_name');
            $table->string('room_price');
            $table->string('room_description');
            $table->string('image');
            $table->boolean('tv')->nullable();
            $table->boolean('breakfast')->nullable();
            $table->boolean('wifi')->nullable();
            $table->boolean('soundproof')->nullable();
            $table->boolean('computer')->nullable();
            $table->boolean('ac')->nullable();
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
        Schema::dropIfExists('rooms');
    }
}
