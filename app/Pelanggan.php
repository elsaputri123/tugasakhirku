<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    public function users()
    {
    	return $this->belongsTo('App\User', 'user_id');
	}

	public function notakirims()
    {
    	return $this->hasMany('App\Notakirim');
	}
}
