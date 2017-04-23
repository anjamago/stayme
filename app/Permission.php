<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected  $table = "permissions";
    protected  $fillable = ["permission"];

    public function rol_permission(){
        return $this->hasOne('App\rol_permissions');
    }
}
