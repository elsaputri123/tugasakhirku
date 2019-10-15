<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    public function manifests()
    {
    	return $this->hasMany('App\Manifest');
	}

	public function jadwalpengirimans()
    {
    	return $this->hasMany('App\Jadwalpengiriman');
	}
}
