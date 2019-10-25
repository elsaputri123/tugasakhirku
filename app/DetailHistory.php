<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailHistory extends Model
{
    protected $table = "detailhistorys";

    public function history()
    {
    	return $this->hasMany('App\HystoriPengirimans');
	}

	public function manifest()
    {
    	 return $this->belongsTo('App\Manifest', 'manifest_id');
	}	
}
