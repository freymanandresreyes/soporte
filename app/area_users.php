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
    public function ColaboradoresAreaUser()
    {
        return $this->hasMany('App\colaboradores');
    }

    public function AreaUserAreas()
    {
      return $this->belongsTo('App\areas','id_area','id');
    }

    public function AreaUserUser()
    {
      return $this->belongsTo('App\user','id_usuario','id');
    }
}
