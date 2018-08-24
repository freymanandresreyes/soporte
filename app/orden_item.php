<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orden_item extends Model
{
    public function ordenItemsOrdenes()
    {
        return $this->hasMany('App\Ordenes');
    }

    public function ordenItems()
  {
      return $this->belongsTo('App\items','id_item','id');
  }
}
