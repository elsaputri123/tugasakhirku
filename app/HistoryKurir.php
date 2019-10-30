<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryKurir extends Model
{
    protected $table = "historykurir";
    
    public function nota()
    {
    	return $this->belongsTo('App\Notakirim', 'id_nota');
    }
    
    public function kurir()
    {
    	return $this->belongsTo('App\User', 'id_kurir');
    }
}
