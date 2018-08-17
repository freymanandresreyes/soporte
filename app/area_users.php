<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class area_users extends Model
{
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
