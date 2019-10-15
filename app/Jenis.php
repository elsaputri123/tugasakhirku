<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    public function barangs()
    {
    	return $this->hasMany('App\Barang');
	}
}
