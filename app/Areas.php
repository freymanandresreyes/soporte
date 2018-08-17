<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    public function userArea()
    {
        return $this->belongsTo('App\User','id_user','id');
    }
}
