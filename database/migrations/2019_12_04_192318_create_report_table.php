<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report', function (Blueprint $table) {
            $table->increments('report_id');
            $table->integer('room_id')->unsigned()->nullable();
            $table->foreign('room_id')->references('room_id')->on('room')->onDelete('cascade');
            $table->integer('st_id')->unsigned()->nullable();
            $table->foreign('st_id')->references('st_id')->on('student')->onDelete('cascade');
            $table->string('description');
            $table->string('report_img');
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
        Schema::dropIfExists('report');
    }
}
