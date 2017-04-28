<?php

namespace App\Domain\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'telepon', 'email', 'password', 'level',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
