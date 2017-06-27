<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionUsers extends Model
{
    protected $table = "permission_users";
    protected $fillable=["id_permission","id_user","id"];
}
