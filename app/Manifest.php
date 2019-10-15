<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manifest extends Model
{
    public function kendaraans()
    {
    	return $this->belongsTo('App\Kendaraan', 'kendaraan_id');
	}

    public function karyawan_sopir()
    {
        return $this->belongsTo('App\Karyawan', 'karyawan_id_sopir');
    }


	public function notakirims()
    {
    	return $this->hasMany('App\Notakirim');
	}
}
