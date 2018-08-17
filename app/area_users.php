<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class area_users extends Model
{
    public function areaAreauser()
    {
        return $this->belongsTo('App\Areas','id_area','id');
    }
    public function userAreauser()
    {
        return $this->belongsTo('App\User','id_usuario','id');
    }
}
