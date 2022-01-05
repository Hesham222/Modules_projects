<?php

namespace Users\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Buyer extends Authenticatable
{
    use HasFactory;

    protected $fillable  = ['name','mobile','email','password','created_at','updated_at '];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
