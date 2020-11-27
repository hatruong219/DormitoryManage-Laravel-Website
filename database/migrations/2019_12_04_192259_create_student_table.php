<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->increments('st_id');
            $table->string('msv');
            $table->string('st_pass');
            $table->string('st_name');
            $table->string('st_class');
            $table->string('st_school');
            $table->date('st_birthday');
            $table->string('st_phone');
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('room_id')->on('room')->onDelete('cascade');
            $table->string('st_bike');
            $table->string('st_address');
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
        Schema::dropIfExists('student');
    }
}
