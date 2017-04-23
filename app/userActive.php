<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userActive extends Model
{
    protected $table = 'user_actives';
    protected $fillable = ['active'];
}
