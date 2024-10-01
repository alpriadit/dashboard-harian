<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'usertab';
    protected $primaryKey = 'id_user';

    protected $hidden = [
        'passwd',
    ];
}
