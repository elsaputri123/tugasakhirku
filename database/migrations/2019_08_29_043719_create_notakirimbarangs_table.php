<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotakirimbarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notakirimbarangs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('notakirim_id')->unsigned();
            $table->integer('barang_id')->unsigned();

            $table->integer('berat');
            $table->integer('colly');
            

            $table->foreign('notakirim_id')->references('id')->on('notakirims');
            $table->foreign('barang_id')->references('id')->on('barangs');

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
        Schema::dropIfExists('notakirimbarangs');
    }
}
