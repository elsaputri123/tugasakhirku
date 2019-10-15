<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    public function jenis()
    {
    	return $this->belongsTo('App\Jenis', 'jenis_id');
	}

	public function notakirimbarangs()
    {
    	return $this->hasMany('App\Notakirimbarang');
	}
}
