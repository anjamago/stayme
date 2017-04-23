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
        $sql = " select `permissions`.*, `permission_user`.`user_id` as `pivot_user_id`,
                `permission_user`.`permission_id` as `pivot_permission_id` from `permissions`
                 inner join `permission_user` on `permissions`.`id` = `permission_user`.`permission_id`
                 where `permission_user`.`user_id` ={$id}";
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
