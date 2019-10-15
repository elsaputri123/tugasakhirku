<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    public function kelurahans()
    {
    	return $this->hasMany('App\Kelurahan');
	}

	 public function tarifkms()
    {
        return $this->belongsTo('App\Tarifkm', 'tarifkm_id');
    }
}
