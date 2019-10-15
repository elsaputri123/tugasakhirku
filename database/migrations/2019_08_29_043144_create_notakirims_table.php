<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotakirimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notakirims', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('karyawan_id')->unsigned();
            $table->integer('pelanggan_id')->unsigned();
            $table->integer('manifest_id')->unsigned();
            $table->integer('jadwalpengiriman_id')->unsigned();
            $table->integer('rute_id')->unsigned();
            $table->integer('tarifkm_id')->unsigned();

            $table->string('namapenerima', 45);
            $table->string('alamatpenerima', 45);
            $table->integer('jenispembayaran');
            $table->date('tanggal');
            $table->date('wktkirim');
            $table->date('wkttiba');
            $table->integer('status');
            

            $table->foreign('karyawan_id')->references('id')->on('karyawans');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans');
            $table->foreign('manifest_id')->references('id')->on('manifests');
            $table->foreign('jadwalpengiriman_id')->references('id')->on('jadwalpengirimans');
            $table->foreign('rute_id')->references('id')->on('rutes');
            $table->foreign('tarifkm_id')->references('id')->on('tarifkms');

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
        Schema::dropIfExists('notakirims');
    }
}
