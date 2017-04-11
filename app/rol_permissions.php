<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol_permissions extends Model
{
    public function permission()
    {
        return $this->hasMany('App\permissions','id');
    }
}
