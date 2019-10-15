<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutejadwal extends Model
{
    public function jadwalpengirimans()
    {
    	return $this->belongsTo('App\Jadwalpengiriman', 'jadwalpengiriman_id');
	}

	public function rutes()
    {
    	return $this->belongsTo('App\Rute', 'rute_id');
	}
}
