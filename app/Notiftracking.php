<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Notiftracking extends Model
{
    protected $table = "notiftracking";
    
    public function nota()
    {
    	return $this->belongsTo('App\Notakirim', 'id_nota');
    }
}
