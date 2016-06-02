<?php

namespace App;

use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table    = 'users';
    protected $fillable = ['username', 'password'];
    protected $hidden   = ['password'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
