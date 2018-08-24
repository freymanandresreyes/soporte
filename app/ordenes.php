<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ordenes extends Model
{
    public function idAreaSolicita()
  {
      return $this->belongsTo('App\area_users','id_area_solicita','id');
  }

   public function idAreaDestino()
  {
      return $this->belongsTo('App\area_users','id_area_destino','id');
  }
}
