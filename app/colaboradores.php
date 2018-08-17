<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colaboradores extends Model
{
    public function AreaUserColaboradores()
  {
      return $this->belongsTo('App\area_users','id_area_encargada','id');
  }

  public function UserColaboradores()
  {
      return $this->belongsTo('App\user','id_usuario','id');
  }
}
