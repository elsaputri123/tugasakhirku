<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    public function jabatans()
    {
    	return $this->belongsTo('App\Jabatan', 'jabatan_id');
	}

	public function users()
    {
    	return $this->belongsTo('App\User', 'user_id');
	}

	public function manifests()
	{
		return $this->hasMany('App\Manifest');
	}

	public function jadwalpengirimans()
	{
		return $this->hasMany('App\Jadwalpengiriman');
	}

	public function notakirims()
	{
		return $this->hasMany('App\Notakirim');
	}
}
