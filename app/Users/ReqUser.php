<?php

namespace App\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ReqUser extends Authenticatable
{
    protected $table = 'usuario';
}
