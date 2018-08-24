<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public function itemsOrdenItems()
    {
        return $this->hasMany('App\orden_item');
    }
}
