<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_detail', function (Blueprint $table) {
            $table->increments('detail_id');
            $table->integer('bill_id')->unsigned()->nullable();
            $table->foreign('bill_id')->references('bill_id')->on('bill')->onDelete('cascade');            
            $table->string('status');
            $table->integer('firts_electric');
            $table->integer('end_electric');
            $table->integer('num_electric');
            $table->integer('firts_water');
            $table->integer('end_water');
            $table->integer('num_water');
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
        Schema::dropIfExists('bill_detail');
    }
}
