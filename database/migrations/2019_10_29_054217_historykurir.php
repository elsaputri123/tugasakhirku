<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HistoryKurir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historykurir', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->integer('id_kurir')->unsigned();
            $table->integer('id_nota')->unsigned();
            
            $table->foreign('id_kurir')->references('id')->on('users');
            $table->foreign('id_nota')->references('id')->on('notakirims');

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
        Schema::dropIfExists('historykurir');
    }
}
