<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifkm extends Model
{
    public function notakirims()
    {
    	return $this->hasMany('App\Notakirim');
	}
}
