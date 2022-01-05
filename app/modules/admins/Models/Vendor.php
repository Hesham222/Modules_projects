<?php

namespace Admins\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use HasFactory;

    protected $fillable  = ['name','mobile','email','password','area_id','created_at','updated_at '];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function area(){
        return  $this->belongsTo('Admins\Models\Area','area_id')->select('id','name');
    }
}
