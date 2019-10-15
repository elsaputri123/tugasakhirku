<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notakirim extends Model
{
    public function karyawans()
    {
    	return $this->belongsTo('App\Karyawan', 'karyawan_id');
	}

	public function pelanggans()
    {
    	return $this->belongsTo('App\Pelanggan', 'pelanggan_id');
	}

	public function manifests()
    {
    	return $this->belongsTo('App\Manifests', 'manifest_id');
	}

	public function jadwalpengirimans()
    {
    	return $this->belongsTo('App\Jadwalpengiriman', 'jadwalpengiriman_id');
	}

	public function rutes()
    {
    	return $this->belongsTo('App\Rute', 'rute_id');
	}

    public function tarifkms()
    {
        return $this->belongsTo('App\Tarifkm', 'tarifkm_id');
    }

    public function notakirimbarangs()
    {
        return $this->hasMany('App\Notakirimbarang');
    }

    public function kelurahans()
    {
        return $this->belongsTo('App\Kelurahan', 'kelurahan_id');
    }
}
