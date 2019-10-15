<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuteJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rute_jadwals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rute_id')->unsigned();
            $table->integer('jadwalpengiriman_id')->unsigned();

            $table->foreign('rute_id')->references('id')->on('rutes');
            $table->foreign('jadwalpengiriman_id')->references('id')->on('jadwalpengirimans');
           
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
        Schema::dropIfExists('rute_jadwals');
    }
}
