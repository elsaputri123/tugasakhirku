<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalpengirimansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalpengirimans', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('kendaraan_id')->unsigned();
            $table->integer('karyawan_id')->unsigned();
        
            $table->date('tanggal');
            $table->integer('status');
            $table->string('kendaraan', 45);
            
            $table->foreign('kendaraan_id')->references('id')->on('kendaraans');
            $table->foreign('karyawan_id')->references('id')->on('karyawans');
            

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
        Schema::dropIfExists('jadwalpengirimans');
    }
}
