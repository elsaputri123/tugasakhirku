<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notakirimbarang extends Model
{
    public function barangs()
    {
    	return $this->belongsTo('App\Barang', 'barang_id');
	}

	public function notakirims()
    {
    	return $this->belongsTo('App\Notakirim', 'notakirim_id');
	}
}
