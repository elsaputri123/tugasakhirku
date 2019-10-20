<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HystoriPengirimans extends Model
{
    protected $table = 'historypengirimans';

    public function ruteawal()
    {
    	return $this->belongsTo('App\Rute', 'lokasi_awal');
    }

    public function ruteakhir()
    {
    	return $this->belongsTo('App\Rute', 'lokasi_akhir');
    }

    public function jadwal()
    {
    	return $this->belongsTo('App\Jadwalpengiriman', 'jadwalpengiriman_id');
    }
}
