<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    public function kecamatans()
    {
        return $this->belongsTo('App\Kecamatan', 'kecamatan_id');
    }
}
