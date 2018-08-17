<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    public function AreasAreaUser()
    {
        return $this->hasMany('App\area_users');
    }
}
