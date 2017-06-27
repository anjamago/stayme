<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    public function permission(){
        return $this->belongsToMany(Permission::class)->using(PermissionUser::class);
    }

    #esto es una alternativa al error de arriba
    public function rol($id){
        $sql = " SELECT permission
                FROM permissions as pms
                INNER JOIN permission_users as pmsusr  on pms.id = pmsusr.id_permission
                WHERE pmsusr.id_user ={$id}";
        return  DB::select($sql);
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
