<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    public function rutejadwals()
    {
    	return $this->hasMany('App\Rutejadwal');
	}

	public function notakirims()
    {
    	return $this->hasMany('App\Notakirim');
	}

	public function kecamatan()
	{
		return $this->belongsTo('App\Kecamatan', 'kecamatan_id');
	}
}
