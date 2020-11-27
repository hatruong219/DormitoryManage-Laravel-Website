<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flood', function (Blueprint $table) {
            $table->increments('flood_id');
            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('area_id')->on('area')->onDelete('cascade');
            $table->string('flood_name');
            $table->integer('num_room_flood');
            $table->integer('num_st_flood');
            
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
        Schema::dropIfExists('flood');
    }
}
