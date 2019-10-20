<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwalpengiriman extends Model
{
    protected $table = 'jadwalpengirimans';
    
    public function karyawans()
    {
    	return $this->belongsTo('App\Karyawan', 'karyawan_id_kurir');
	}

	public function kendaraans()
    {
    	return $this->belongsTo('App\Kendaraan', 'kendaraan_id');
	}

	public function notakirims()
    {
    	return $this->hasMany('App\Notakirim');
	}

	public function rutejadwals()
    {
    	return $this->hasMany('App\Rutejadwal');
	}



}
