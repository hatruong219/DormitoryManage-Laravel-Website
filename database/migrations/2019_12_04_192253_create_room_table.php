<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->increments('room_id');
            $table->integer('flood_id')->unsigned();
            $table->foreign('flood_id')->references('flood_id')->on('flood')->onDelete('cascade');
            $table->string('room_name');
            $table->string('captain_name');
            $table->string('captain_phone');
            $table->integer('num_member');
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
        Schema::dropIfExists('room');
    }
}
